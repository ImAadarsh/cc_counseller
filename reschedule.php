<?php
include "include/session.php";
include "include/config.php";
include "include/connect.php";
require_once("../email_templates/email_functions.php");

// Require login to access this page
require_trainer_login();

// Get trainer ID and token from session
$trainer_id = get_trainer_id();
$trainer_token = get_trainer_token();

// Handle form submission for creating a new reschedule request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create_request'])) {
    $booking_id = (int)$_POST['booking_id'];
    $requested_date = $connect->real_escape_string($_POST['requested_date']);
    $requested_start_time = $connect->real_escape_string($_POST['requested_start_time']);
    $requested_end_time = $connect->real_escape_string($_POST['requested_end_time']);
    $reason = $connect->real_escape_string($_POST['reason']);
    
    // Get the original time slot ID
    $slot_query = "SELECT time_slot_id FROM bookings WHERE id = $booking_id";
    $slot_result = $connect->query($slot_query);
    $original_time_slot_id = $slot_result->fetch_assoc()['time_slot_id'];
    
    // Get user ID from booking
    $user_query = "SELECT user_id FROM bookings WHERE id = $booking_id";
    $user_result = $connect->query($user_query);
    $user_id = $user_result->fetch_assoc()['user_id'];
    
    // Create reschedule request
    $insert_sql = "INSERT INTO reschedule_requests 
                  (booking_id, user_id, trainer_id, original_time_slot_id, 
                   requested_date, requested_start_time, requested_end_time, 
                   reason, status, requested_by, created_at, updated_at)
                  VALUES 
                  ($booking_id, $user_id, $trainer_id, $original_time_slot_id,
                   '$requested_date', '$requested_start_time', '$requested_end_time',
                   '$reason', 'pending', 'trainer', NOW(), NOW())";
    
    # also make the time slot status as pending_reschedule
    $update_slot_sql = "UPDATE bookings SET status = 'pending_reschedule' WHERE id = $booking_id";
    $connect->query($update_slot_sql);
    
    if ($connect->query($insert_sql)) {
        // Get request details for email
        $req_sql = "SELECT rr.*, 
                   u.first_name as user_first_name, u.last_name as user_last_name, u.email as user_email,
                   t.first_name as trainer_first_name, t.last_name as trainer_last_name, t.email as trainer_email,
                   ts.start_time as original_start_time, ts.end_time as original_end_time,
                   ta.date as original_date
                   FROM reschedule_requests rr
                   JOIN users u ON rr.user_id = u.id
                   JOIN trainers t ON rr.trainer_id = t.id
                   JOIN time_slots ts ON rr.original_time_slot_id = ts.id
                   JOIN trainer_availabilities ta ON ts.trainer_availability_id = ta.id
                   WHERE rr.id = " . $connect->insert_id;
        $req_result = $connect->query($req_sql);
        $req_data = $req_result->fetch_assoc();

        // Prepare email data for user
        $user_email_data = [
            'name' => $req_data['user_first_name'] . ' ' . $req_data['user_last_name'],
            'counselor_name' => $req_data['trainer_first_name'] . ' ' . $req_data['trainer_last_name'],
            'original_session' => [
                'date' => date('F j, Y', strtotime($req_data['original_date'])),
                'time' => date('g:i A', strtotime($req_data['original_start_time'])) . ' - ' . date('g:i A', strtotime($req_data['original_end_time']))
            ],
            'requested_session' => [
                'date' => date('F j, Y', strtotime($req_data['requested_date'])),
                'time' => date('g:i A', strtotime($req_data['requested_start_time'])) . ' - ' . date('g:i A', strtotime($req_data['requested_end_time']))
            ],
            'reason' => $req_data['reason'],
            'booking_id' => $req_data['booking_id']
        ];

        // Prepare email data for admin
        $admin_email_data = [
            'name' => 'Admin',
            'student_name' => $req_data['user_first_name'] . ' ' . $req_data['user_last_name'],
            'counselor_name' => $req_data['trainer_first_name'] . ' ' . $req_data['trainer_last_name'],
            'original_session' => [
                'date' => date('F j, Y', strtotime($req_data['original_date'])),
                'time' => date('g:i A', strtotime($req_data['original_start_time'])) . ' - ' . date('g:i A', strtotime($req_data['original_end_time']))
            ],
            'requested_session' => [
                'date' => date('F j, Y', strtotime($req_data['requested_date'])),
                'time' => date('g:i A', strtotime($req_data['requested_start_time'])) . ' - ' . date('g:i A', strtotime($req_data['requested_end_time']))
            ],
            'reason' => $req_data['reason'],
            'booking_id' => $req_data['booking_id']
        ];

        // Send email to user
        send_email(
            $req_data['user_email'],
            'New Reschedule Request - Campus Coach',
            'reschedule_request',
            $user_email_data
        );

        // Send email to admin
        send_email(
            'cc@eduace.in', // Replace with actual admin email
            'New Reschedule Request - Campus Coach',
            'reschedule_notification',
            $admin_email_data
        );

        $success_message = "Reschedule request created successfully.";
    } else {
        $error_message = "Error creating reschedule request: " . $connect->error;
    }
}

// Handle request status updates
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_status'])) {
    $request_id = (int)$_POST['request_id'];
    $status = $connect->real_escape_string($_POST['status']);
    
    $update_sql = "UPDATE reschedule_requests SET status = '$status', updated_at = NOW() WHERE id = $request_id";
    
    if ($connect->query($update_sql)) {
        // Get request details for email
        $req_sql = "SELECT rr.*, 
                   u.first_name as user_first_name, u.last_name as user_last_name, u.email as user_email,
                   t.first_name as trainer_first_name, t.last_name as trainer_last_name, t.email as trainer_email,
                   ts_original.start_time as original_start_time, ts_original.end_time as original_end_time,
                   ta_original.date as original_date
                   FROM reschedule_requests rr
                   JOIN users u ON rr.user_id = u.id
                   JOIN trainers t ON rr.trainer_id = t.id
                   JOIN time_slots ts_original ON rr.original_time_slot_id = ts_original.id
                   JOIN trainer_availabilities ta_original ON ts_original.trainer_availability_id = ta_original.id
                   WHERE rr.id = $request_id";
        $req_result = $connect->query($req_sql);
        $req_data = $req_result->fetch_assoc();

        // Prepare email data for user
        $user_email_data = [
            'name' => $req_data['user_first_name'] . ' ' . $req_data['user_last_name'],
            'counselor_name' => $req_data['trainer_first_name'] . ' ' . $req_data['trainer_last_name'],
            'original_session' => [
                'date' => date('F j, Y', strtotime($req_data['original_date'])),
                'time' => date('g:i A', strtotime($req_data['original_start_time'])) . ' - ' . date('g:i A', strtotime($req_data['original_end_time']))
            ],
            'requested_session' => [
                'date' => date('F j, Y', strtotime($req_data['requested_date'])),
                'time' => date('g:i A', strtotime($req_data['requested_start_time'])) . ' - ' . date('g:i A', strtotime($req_data['requested_end_time']))
            ],
            'status' => $status,
            'booking_id' => $req_data['booking_id']
        ];

            // echo "<pre>";
            // print_r($user_email_data);
            // echo "</pre>";
      

        // Prepare email data for admin
        $admin_email_data = [
            'name' => 'Admin',
            'student_name' => $req_data['user_first_name'] . ' ' . $req_data['user_last_name'],
            'counselor_name' => $req_data['trainer_first_name'] . ' ' . $req_data['trainer_last_name'],
            'original_session' => [
                'date' => date('F j, Y', strtotime($req_data['original_date'])),
                'time' => date('g:i A', strtotime($req_data['original_start_time'])) . ' - ' . date('g:i A', strtotime($req_data['original_end_time']))
            ],
            'requested_session' => [
                'date' => date('F j, Y', strtotime($req_data['requested_date'])),
                'time' => date('g:i A', strtotime($req_data['requested_start_time'])) . ' - ' . date('g:i A', strtotime($req_data['requested_end_time']))
            ],
            'status' => $status,
            'booking_id' => $req_data['booking_id']
        ];
        // echo "<pre>";
        // print_r($admin_email_data);
        // echo "</pre>";
  

        // Send email to user
        send_email(
            $req_data['user_email'],
            'Reschedule Request ' . ucfirst($status) . ' - Campus Coach',
            'reschedule_approval',
            $user_email_data
        );

        // Send email to admin
        send_email(
            'cc@eduace.in', // Replace with actual admin email
            'Reschedule Request ' . ucfirst($status) . ' - Campus Coach',
            'reschedule_approval',
            $admin_email_data
        );

        // If approved, create an approval record
        if ($status == 'approved') {
            // Get the request details
            $req_sql = "SELECT * FROM reschedule_requests WHERE id = $request_id";
            $req_result = $connect->query($req_sql);
            $req_data = $req_result->fetch_assoc();
            
            // Create or find a time slot for the new date/time
            $check_slot_sql = "SELECT ts.id FROM time_slots ts 
                              JOIN trainer_availabilities ta ON ts.trainer_availability_id = ta.id
                              WHERE ta.trainer_id = $trainer_id 
                              AND ta.date = '{$req_data['requested_date']}'
                              AND ts.start_time = '{$req_data['requested_start_time']}'
                              AND ts.end_time = '{$req_data['requested_end_time']}'";
            
            $check_slot_result = $connect->query($check_slot_sql);
            
            if ($check_slot_result->num_rows > 0) {
                // Use existing time slot
                $new_slot_id = $check_slot_result->fetch_assoc()['id'];
            } else {
                // Check if there's an availability for the requested date
                $avail_check_sql = "SELECT id FROM trainer_availabilities 
                                   WHERE trainer_id = $trainer_id AND date = '{$req_data['requested_date']}'";
                $avail_result = $connect->query($avail_check_sql);
                
                if ($avail_result->num_rows > 0) {
                    // Use existing availability
                    $availability_id = $avail_result->fetch_assoc()['id'];
                } else {
                    // Create new availability
                    $insert_avail_sql = "INSERT INTO trainer_availabilities (trainer_id, date, created_at, updated_at)
                                       VALUES ($trainer_id, '{$req_data['requested_date']}', NOW(), NOW())";
                    $connect->query($insert_avail_sql);
                    $availability_id = $connect->insert_id;
                }
                
                // Get duration and price from original time slot
                $original_slot_sql = "SELECT duration_minutes, price FROM time_slots WHERE id = {$req_data['original_time_slot_id']}";
                $original_slot_result = $connect->query($original_slot_sql);
                $original_slot = $original_slot_result->fetch_assoc();
                
                // Create new time slot
                $insert_slot_sql = "INSERT INTO time_slots 
                                   (trainer_availability_id, start_time, end_time, duration_minutes, price, status, created_at, updated_at)
                                   VALUES 
                                   ($availability_id, '{$req_data['requested_start_time']}', '{$req_data['requested_end_time']}',
                                    {$original_slot['duration_minutes']}, {$original_slot['price']}, 'booked', NOW(), NOW())";
                $connect->query($insert_slot_sql);
                $new_slot_id = $connect->insert_id;
            }
            
            // Create approval record
            $approval_sql = "INSERT INTO reschedule_approvals 
                            (reschedule_request_id, approved_by_id, approved_by_type, new_time_slot_id, created_at, updated_at)
                            VALUES 
                            ($request_id, $trainer_id, 'trainer', $new_slot_id, NOW(), NOW())";
            $connect->query($approval_sql);
            
            // Update the booking with the new time slot
            $update_booking_sql = "UPDATE bookings SET time_slot_id = $new_slot_id, status = 'confirmed' WHERE id = {$req_data['booking_id']}";
            $connect->query($update_booking_sql);
        }
        
        $success_message = "Request status updated successfully.";
    } else {
        $error_message = "Error updating request status: " . $connect->error;
    }
}

// Pagination settings
$records_per_page = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $records_per_page;

// Status filter
$status_filter = isset($_GET['status']) ? $_GET['status'] : '';
$status_filter_sql = "";
if ($status_filter) {
    $status_filter_sql = " AND rr.status = '$status_filter'";
}

// Count total records
$count_sql = "SELECT COUNT(*) as total FROM reschedule_requests rr 
              WHERE rr.trainer_id = $trainer_id" . $status_filter_sql;
$count_result = $connect->query($count_sql);
$count_row = $count_result->fetch_assoc();
$total_records = $count_row['total'];
$total_pages = ceil($total_records / $records_per_page);

// Fetch reschedule requests
$sql = "SELECT rr.*, 
        b.id as booking_id,
        u.first_name as user_first_name, u.last_name as user_last_name,
        ts.start_time as original_start_time, ts.end_time as original_end_time,
        ta.date as original_date
        FROM reschedule_requests rr 
        JOIN bookings b ON rr.booking_id = b.id
        JOIN users u ON rr.user_id = u.id
        JOIN time_slots ts ON rr.original_time_slot_id = ts.id
        JOIN trainer_availabilities ta ON ts.trainer_availability_id = ta.id
        WHERE rr.trainer_id = $trainer_id" . $status_filter_sql . "
        ORDER BY rr.created_at DESC
        LIMIT $offset, $records_per_page";

$results = $connect->query($sql);

// Fetch bookings for creating new reschedule requests
$bookings_sql = "SELECT b.id as booking_id, b.status, 
                u.first_name, u.last_name,
                ts.start_time, ts.end_time, ts.id as time_slot_id,
                ta.date
                FROM bookings b
                JOIN users u ON b.user_id = u.id
                JOIN time_slots ts ON b.time_slot_id = ts.id
                JOIN trainer_availabilities ta ON ts.trainer_availability_id = ta.id
                WHERE ta.trainer_id = $trainer_id
                AND b.status = 'confirmed'
                AND ta.date >= CURDATE()
                ORDER BY ta.date ASC";
$bookings_result = $connect->query($bookings_sql);
?>

<!DOCTYPE html>
<html lang="en">

<?php include "include/meta.php" ?>

<body>
    <div class="main-page-wrapper">
        <!-- Loading Transition -->
        <!-- <div id="preloader">
            <div id="ctn-preloader" class="ctn-preloader">
                <div class="icon"><img src="images/loader.gif" alt="" class="m-auto d-block" width="250"></div>
            </div>
        </div> -->

        <!-- Dashboard Aside Menu -->
        <?php include "include/aside.php" ?>
        <!-- /.dash-aside-navbar -->

        <!-- Dashboard Body -->
        <div class="dashboard-body">
            <div class="position-relative">
                <!-- Header -->
                <?php include "include/header.php" ?>
                <!-- End Header -->
<br>
<br>

                <h2 class="main-title d-block d-lg-none">Reschedule Requests</h2>
                
                <?php if (isset($success_message)): ?>
                <div class="alert alert-success"><?php echo $success_message; ?></div>
                <?php endif; ?>
                
                <?php if (isset($error_message)): ?>
                <div class="alert alert-danger"><?php echo $error_message; ?></div>
                <?php endif; ?>
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createRequestModal">
                            Create Reschedule Request
                        </button>
                    </div>
                    <div class="col-md-6">
                        <form method="GET" class="d-flex justify-content-end">
                            <select name="status" class="form-control me-2" style="width: auto;">
                                <option value="">All Statuses</option>
                                <option value="pending" <?php echo $status_filter == 'pending' ? 'selected' : ''; ?>>Pending</option>
                                <option value="approved" <?php echo $status_filter == 'approved' ? 'selected' : ''; ?>>Approved</option>
                                <option value="rejected" <?php echo $status_filter == 'rejected' ? 'selected' : ''; ?>>Rejected</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </form>
                    </div>
                </div>

                <div class="bg-white card-box p0 border-20">
                    <div class="table-responsive pt-25 pb-25 pe-4 ps-4">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Student</th>
                                    <th>Original Date/Time</th>
                                    <th>Requested Date/Time</th>
                                    <th>Requested By</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($results->num_rows > 0) {
                                    while ($row = $results->fetch_assoc()) {
                                        // Format dates and times
                                        $original_date = date("d M, Y", strtotime($row['original_date']));
                                        $original_start = date("h:i A", strtotime($row['original_start_time']));
                                        $original_end = date("h:i A", strtotime($row['original_end_time']));
                                        
                                        $requested_date = date("d M, Y", strtotime($row['requested_date']));
                                        $requested_start = date("h:i A", strtotime($row['requested_start_time']));
                                        $requested_end = date("h:i A", strtotime($row['requested_end_time']));
                                        
                                        // Status class
                                        $status_class = '';
                                        if ($row['status'] == 'approved') {
                                            $status_class = 'active';
                                        } elseif ($row['status'] == 'pending') {
                                            $status_class = 'pending';
                                        } elseif ($row['status'] == 'rejected') {
                                            $status_class = 'processing';
                                        }
                                ?>
                                <tr>
                                    <td><?php echo $row['user_first_name'] . ' ' . $row['user_last_name']; ?></td>
                                    <td>
                                        <div><?php echo $original_date; ?></div>
                                        <div><?php echo $original_start; ?> - <?php echo $original_end; ?></div>
                                    </td>
                                    <td>
                                        <div><?php echo $requested_date; ?></div>
                                        <div><?php echo $requested_start; ?> - <?php echo $requested_end; ?></div>
                                    </td>
                                    <td><?php echo  ucfirst($row['requested_by']); ?></td>
                                    <td><?php echo $row['reason']; ?></td>
                                    <td><div class="property-status <?php echo strtolower($status_class); ?>"><?php echo ucfirst($row['status']); ?></div></td>
                                    <td>
                                        <?php if ($row['status'] == 'pending' && $row['requested_by']!='trainer'): ?>
                                        <div class="d-flex">
                                            <form method="post" class="me-2">
                                                <input type="hidden" name="request_id" value="<?php echo $row['id']; ?>">
                                                <input type="hidden" name="update_status" value="1">
                                                <input type="hidden" name="status" value="approved">
                                                <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                            </form>
                                            <form method="post">
                                                <input type="hidden" name="request_id" value="<?php echo $row['id']; ?>">
                                                <input type="hidden" name="update_status" value="1">
                                                <input type="hidden" name="status" value="rejected">
                                                <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                                            </form>
                                        </div>
                                        <?php else: ?>
                                        <span class="text-muted">No actions available</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    echo '<tr><td colspan="6" class="text-center">No reschedule requests found</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>                    
                </div>
                
                <!-- Pagination -->
                <?php if ($total_pages > 1): ?>
                <ul class="pagination-one d-flex align-items-center justify-content-center style-none pt-40">
                    <?php if ($page > 1): ?>
                    <li><a href="?page=1&status=<?php echo $status_filter; ?>">1</a></li>
                    <?php endif; ?>
                    
                    <?php
                    $start_page = max(2, $page - 2);
                    $end_page = min($total_pages - 1, $page + 2);
                    
                    if ($start_page > 2) {
                        echo '<li>...</li>';
                    }
                    
                    for ($i = $start_page; $i <= $end_page; $i++) {
                        if ($i == $page) {
                            echo '<li class="active"><a href="#">' . $i . '</a></li>';
                        } else {
                            echo '<li><a href="?page=' . $i . '&status=' . $status_filter . '">' . $i . '</a></li>';
                        }
                    }
                    
                    if ($end_page < $total_pages - 1) {
                        echo '<li>...</li>';
                    }
                    
                    if ($total_pages > 1 && $page != $total_pages) {
                        echo '<li><a href="?page=' . $total_pages . '&status=' . $status_filter . '">' . $total_pages . '</a></li>';
                    }
                    ?>
                    
                    <?php if ($page < $total_pages): ?>
                    <li class="ms-2"><a href="?page=<?php echo $page+1; ?>&status=<?php echo $status_filter; ?>" class="d-flex align-items-center">Next <img src="images/icon/icon_46.svg" alt="" class="ms-2"></a></li>
                    <?php endif; ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
        <!-- /.dashboard-body -->
        
        <!-- Create Request Modal -->
        <div class="modal fade" id="createRequestModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Reschedule Request</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <div class="mb-3">
                                <label class="form-label">Select Booking</label>
                                <select name="booking_id" class="form-control" required>
                                    <option value="">Select a booking</option>
                                    <?php
                                                                        if ($bookings_result->num_rows > 0) {
                                                                            while ($row = $bookings_result->fetch_assoc()) {
                                                                                $booking_date = date("d M, Y", strtotime($row['date']));
                                                                                $booking_time = date("h:i A", strtotime($row['start_time'])) . " - " . date("h:i A", strtotime($row['end_time']));
                                                                                echo '<option value="' . $row['booking_id'] . '">' . $booking_date . ' | ' . $booking_time . ' | ' . $row['first_name'] . ' ' . $row['last_name'] . '</option>';
                                                                            }
                                                                        } else {
                                                                            echo '<option value="" disabled>No upcoming confirmed bookings available</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Requested Date</label>
                                                                    <input type="date" name="requested_date" class="form-control" required min="<?php echo date('Y-m-d', strtotime('today')); ?>">
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6 mb-3">
                                                                        <label class="form-label">Requested Start Time</label>
                                                                        <input type="time" name="requested_start_time" class="form-control" required>
                                                                    </div>
                                                                    <div class="col-md-6 mb-3">
                                                                        <label class="form-label">Requested End Time</label>
                                                                        <input type="time" name="requested_end_time" class="form-control" required>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Reason for Rescheduling</label>
                                                                    <textarea name="reason" class="form-control" rows="3" required></textarea>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                    <button type="submit" name="create_request" class="btn btn-primary">Submit Request</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- jQuery first -->
                                            <script src="vendor/jquery.min.js"></script>
                                            <!-- Then Bootstrap JS -->
                                            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                                            <!-- Then jQuery Nice Select -->
                                            <script src="vendor/nice-select/jquery.nice-select.min.js"></script>

                                            <!-- Your custom script last -->
                                            <script>
                                                $(document).ready(function() {
                                                    // Initialize nice select
                                                    $('.nice-select').niceSelect();
                                                    
                                                    // Handle sort change
                                                    $('#sort-select').on('change', function() {
                                                        window.location.href = 'reschedule.php?sort=' + $(this).val();
                                                    });
                                                    
                                                    // Initialize Bootstrap modals if needed
                                                    if (typeof bootstrap !== 'undefined') {
                                                        var createRequestModal = new bootstrap.Modal(document.getElementById('createRequestModal'));
                                                    }
                                                });
                                            </script>

                                        </div> <!-- /.main-page-wrapper -->
                                    </body>
                                    </html>
                                    
