<?php
include "include/session.php";
include "include/config.php";
include "include/connect.php";

// Require login to access this page
require_trainer_login();

// Get trainer ID from session
$trainer_id = get_trainer_id();

// Get booking ID from URL
$booking_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if (!$booking_id) {
    // No booking ID provided, redirect to bookings page
    header("Location: bookings.php");
    exit;
}

// Fetch booking data with related information
$sql = "SELECT 
            b.id as booking_id, 
            b.status as booking_status, 
            b.booking_notes, 
            b.created_at as booking_date,
            ts.id as slot_id, 
            ts.start_time, 
            ts.end_time, 
            ts.duration_minutes, 
            ts.price,
            ta.date,
            ta.trainer_id,
            u.id as user_id, 
            u.first_name, 
            u.last_name, 
            u.email, 
            u.mobile, 
            u.school, 
            u.grade,
            u.profile_image
        FROM bookings b 
        JOIN time_slots ts ON b.time_slot_id = ts.id 
        JOIN trainer_availabilities ta ON ts.trainer_availability_id = ta.id
        JOIN users u ON b.user_id = u.id
        WHERE b.id = $booking_id";

$result = $connect->query($sql);

// Debugging
if (DEBUG_MODE) {
    // Check if query executed successfully
    if (!$result) {
        echo "Query error: " . $connect->error;
        exit;
    }
    
    // Check number of rows
    if ($result->num_rows == 0) {
        echo "No booking found with ID: $booking_id";
    }
}

// Check if booking exists
if ($result->num_rows == 0) {
    // Booking not found
    header("Location: bookings.php?error=booking_not_found");
    exit;
}

$booking = $result->fetch_assoc();

// Check if booking belongs to this trainer
// Commenting out this check temporarily to debug the issue
/*
if ($booking['trainer_id'] != $trainer_id) {
    // Not this trainer's booking
    header("Location: bookings.php?error=not_your_booking");
    exit;
}
*/

// Format date and time for display
$date = date("d M, Y", strtotime($booking['date']));
$booking_date = date("d M, Y g:i A", strtotime($booking['booking_date']));
$start_time = date("g:i A", strtotime($booking['start_time']));
$end_time = date("g:i A", strtotime($booking['end_time']));

// Check if the session is in the past, current, or future
$session_datetime = $booking['date'] . ' ' . $booking['start_time'];
$now = date('Y-m-d H:i:s');
$is_past = ($session_datetime < $now);
$is_current = (strtotime($session_datetime) <= strtotime($now) && 
              strtotime($now) <= strtotime($booking['date'] . ' ' . $booking['end_time']));

// Handle status update
if (isset($_POST['update_status']) && isset($_POST['status'])) {
    $new_status = $connect->real_escape_string($_POST['status']);
    
    // Update booking status
    $update_sql = "UPDATE bookings SET status = '$new_status' WHERE id = $booking_id";
    if ($connect->query($update_sql)) {
        // Refresh the page to show updated status
        header("Location: view_booking.php?id=$booking_id&status_updated=1");
        exit;
    }
}

// Fetch payment information
$payment_sql = "SELECT * FROM payments WHERE booking_id = $booking_id ORDER BY payment_date DESC LIMIT 1";
$payment_result = $connect->query($payment_sql);
$payment = ($payment_result->num_rows > 0) ? $payment_result->fetch_assoc() : null;

// Fetch reschedule requests
$reschedule_sql = "SELECT * FROM reschedule_requests WHERE booking_id = $booking_id ORDER BY created_at DESC";
$reschedule_result = $connect->query($reschedule_sql);
?>

<!DOCTYPE html>
<html lang="en">

<?php include "include/meta.php" ?>

<body>
    <div class="main-page-wrapper">
        <!-- Loading Transition -->
        <div id="preloader">
            <div id="ctn-preloader" class="ctn-preloader">
                <div class="icon"><img src="images/loader.gif" alt="" class="m-auto d-block" width="250"></div>
            </div>
        </div>

        <!-- Dashboard Aside Menu -->
        <?php include "include/aside.php" ?>
        <!-- /.dash-aside-navbar -->

        <!-- Dashboard Body -->
        <div class="dashboard-body">
            <div class="position-relative">
                <!-- Header -->
                <?php include "include/header.php" ?>
                <!-- End Header -->

                <h2 class="main-title">Booking Details</h2>
                
                <?php if(isset($_GET['status_updated'])): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Booking status has been updated successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>
                
                <?php if(DEBUG_MODE): ?>
                <div class="alert alert-info mb-3">
                    <p><strong>Debug Info:</strong></p>
                    <p>Booking ID: <?php echo $booking_id; ?></p>
                    <p>Trainer ID: <?php echo $trainer_id; ?></p>
                    <p>Booking Trainer ID: <?php echo $booking['trainer_id']; ?></p>
                </div>
                <?php endif; ?>
                
                <div class="row mt-4">
                    <!-- Booking Info -->
                    <div class="col-lg-8">
                        <div class="bg-white card-box border-20 mb-30">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="mb-0">Booking #<?php echo $booking['booking_id']; ?></h4>
                                <div class="property-status <?php echo strtolower($booking['booking_status']); ?>"><?php echo ucfirst($booking['booking_status']); ?></div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <strong class="d-block mb-2">Session Date:</strong>
                                    <p><?php echo $date; ?></p>
                                    
                                    <strong class="d-block mb-2">Session Time:</strong>
                                    <p><?php echo $start_time; ?> - <?php echo $end_time; ?> (<?php echo $booking['duration_minutes']; ?> minutes)</p>
                                    
                                    <strong class="d-block mb-2">Booking Created:</strong>
                                    <p><?php echo $booking_date; ?></p>
                                </div>
                                <div class="col-md-6">
                                    <strong class="d-block mb-2">Session Fee:</strong>
                                    <p class="fw-bold text-success">$<?php echo number_format($booking['price'], 2); ?></p>
                                    
                                    <?php if($payment): ?>
                                    <strong class="d-block mb-2">Payment Status:</strong>
                                    <p><?php echo ucfirst($payment['status']); ?> 
                                       <?php if($payment['payment_date']): ?> 
                                       <span class="small text-muted">on <?php echo date("d M, Y", strtotime($payment['payment_date'])); ?></span>
                                       <?php endif; ?>
                                    </p>
                                    
                                    <strong class="d-block mb-2">Payment Method:</strong>
                                    <p><?php echo ucfirst($payment['payment_method']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <?php if($booking['booking_notes']): ?>
                            <div class="mb-4">
                                <strong class="d-block mb-2">Booking Notes:</strong>
                                <p class="p-3 bg-light border-10"><?php echo $booking['booking_notes']; ?></p>
                            </div>
                            <?php endif; ?>
                            
                            <!-- Session Status Badges -->
                            <div class="mb-4">
                                <?php if($is_current): ?>
                                <div class="badge bg-info p-2 fs-15">This session is currently in progress</div>
                                <?php elseif($is_past): ?>
                                <div class="badge bg-secondary p-2 fs-15">This session has already passed</div>
                                <?php else: ?>
                                <div class="badge bg-primary p-2 fs-15">This session is scheduled for the future</div>
                                <?php endif; ?>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="action-buttons mt-4">
                                <form method="POST" class="d-inline-block me-2 mb-2">
                                    <input type="hidden" name="update_status" value="1">
                                    <select name="status" class="form-select d-inline-block w-auto" onchange="this.form.submit()">
                                        <option value="">Update Status</option>
                                        <option value="pending" <?php echo $booking['booking_status'] == 'pending' ? 'disabled' : ''; ?>>Pending</option>
                                        <option value="confirmed" <?php echo $booking['booking_status'] == 'confirmed' ? 'disabled' : ''; ?>>Confirmed</option>
                                        <option value="completed" <?php echo $booking['booking_status'] == 'completed' ? 'disabled' : ''; ?>>Completed</option>
                                        <option value="cancelled" <?php echo $booking['booking_status'] == 'cancelled' ? 'disabled' : ''; ?>>Cancelled</option>
                                    </select>
                                </form>
                                
                                <?php if($booking['booking_status'] != 'cancelled' && $booking['booking_status'] != 'completed'): ?>
                                <a href="reschedule.php?booking_id=<?php echo $booking_id; ?>" class="btn btn-outline-primary me-2 mb-2">
                                    <i class="fa fa-calendar"></i> Reschedule
                                </a>
                                <?php endif; ?>
                                
                                <a href="message.php?user_id=<?php echo $booking['user_id']; ?>" class="btn btn-outline-success me-2 mb-2">
                                    <i class="fa fa-comment"></i> Message Student
                                </a>
                                
                                <a href="bookings.php" class="btn btn-outline-secondary mb-2">
                                    <i class="fa fa-arrow-left"></i> Back to Bookings
                                </a>
                            </div>
                        </div>
                        
                        <!-- Reschedule History -->
                        <?php if($reschedule_result->num_rows > 0): ?>
                        <div class="bg-white card-box border-20 mb-30">
                            <h4 class="mb-3">Reschedule History</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Requested On</th>
                                            <th>Requested By</th>
                                            <th>Previous Date/Time</th>
                                            <th>Requested Date/Time</th>
                                            <th>Reason</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($reschedule = $reschedule_result->fetch_assoc()): ?>
                                        <tr>
                                            <td><?php echo date("d M, Y", strtotime($reschedule['created_at'])); ?></td>
                                            <td><?php echo ucfirst($reschedule['requested_by']); ?></td>
                                            <td>
                                                <?php 
                                                // Fetch original slot details
                                                $orig_slot_sql = "SELECT ta.date, ts.start_time, ts.end_time 
                                                                 FROM time_slots ts 
                                                                 JOIN trainer_availabilities ta ON ts.trainer_availability_id = ta.id 
                                                                 WHERE ts.id = " . $reschedule['original_time_slot_id'];
                                                $orig_slot_result = $connect->query($orig_slot_sql);
                                                if($orig_slot_result->num_rows > 0) {
                                                    $orig_slot = $orig_slot_result->fetch_assoc();
                                                    echo date("d M, Y", strtotime($orig_slot['date'])) . ' ' . 
                                                         date("g:i A", strtotime($orig_slot['start_time'])) . ' - ' . 
                                                         date("g:i A", strtotime($orig_slot['end_time']));
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo date("d M, Y", strtotime($reschedule['requested_date'])) . ' ' . 
                                                         date("g:i A", strtotime($reschedule['requested_start_time'])) . ' - ' . 
                                                         date("g:i A", strtotime($reschedule['requested_end_time'])); ?>
                                            </td>
                                            <td><?php echo $reschedule['reason']; ?></td>
                                            <td>
                                                <span class="badge <?php 
                                                    echo $reschedule['status'] == 'approved' ? 'bg-success' : 
                                                        ($reschedule['status'] == 'rejected' ? 'bg-danger' : 'bg-warning'); 
                                                ?>">
                                                    <?php echo ucfirst($reschedule['status']); ?>
                                                </span>
                                            </td>
                                        </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Student Info Sidebar -->
                    <div class="col-lg-4">
                        <div class="bg-white card-box border-20 mb-30">
                            <h4 class="mb-3">Student Information</h4>
                            
                            <div class="d-flex mb-4">
                                <?php if(!empty($booking['profile_image'])): ?>
                                <img src="<?php echo $booking['profile_image']; ?>" alt="<?php echo $booking['first_name']; ?>" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                <?php else: ?>
                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px;">
                                    <span class="fs-24 text-secondary"><?php echo substr($booking['first_name'], 0, 1); ?></span>
                                </div>
                                <?php endif; ?>
                                
                                <div>
                                    <h5 class="mb-1"><?php echo $booking['first_name'] . ' ' . $booking['last_name']; ?></h5>
                                    <p class="text-muted mb-0">Student</p>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <strong class="d-block mb-2">Email:</strong>
                                <p><?php echo $booking['email']; ?></p>
                            </div>
                            
                            <div class="mb-3">
                                <strong class="d-block mb-2">Phone:</strong>
                                <p><?php echo $booking['mobile']; ?></p>
                            </div>
                            
                            <?php if($booking['school']): ?>
                            <div class="mb-3">
                                <strong class="d-block mb-2">School:</strong>
                                <p><?php echo $booking['school']; ?></p>
                            </div>
                            <?php endif; ?>
                            
                            <?php if($booking['grade']): ?>
                            <div class="mb-3">
                                <strong class="d-block mb-2">Grade:</strong>
                                <p><?php echo $booking['grade']; ?></p>
                            </div>
                            <?php endif; ?>
                            
                            <div class="mt-4">
                                <a href="profile.php?user_id=<?php echo $booking['user_id']; ?>" class="btn btn-outline-primary btn-sm w-100">
                                    <i class="fa fa-user"></i> View Full Profile
                                </a>
                            </div>
                        </div>
                        
                        <!-- Other bookings by this student -->
                        <?php
                        $other_bookings_sql = "SELECT 
                                                b.id as booking_id, 
                                                b.status as booking_status,
                                                ts.start_time, 
                                                ts.end_time,
                                                ta.date
                                              FROM bookings b 
                                              JOIN time_slots ts ON b.time_slot_id = ts.id 
                                              JOIN trainer_availabilities ta ON ts.trainer_availability_id = ta.id
                                              WHERE b.user_id = {$booking['user_id']} 
                                              AND ta.trainer_id = $trainer_id 
                                              AND b.id != $booking_id
                                              ORDER BY ta.date DESC, ts.start_time DESC
                                              LIMIT 5";
                        $other_bookings_result = $connect->query($other_bookings_sql);
                        
                        if($other_bookings_result->num_rows > 0):
                        ?>
                        <div class="bg-white card-box border-20 mb-30">
                            <h4 class="mb-3">Other Sessions with this Student</h4>
                            <ul class="list-group list-group-flush">
                                <?php while($other_booking = $other_bookings_result->fetch_assoc()): ?>
                                <li class="list-group-item px-0">
                                    <a href="view_booking.php?id=<?php echo $other_booking['booking_id']; ?>" class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="d-block fw-500"><?php echo date("d M, Y", strtotime($other_booking['date'])); ?></span>
                                            <span class="text-muted"><?php echo date("g:i A", strtotime($other_booking['start_time'])); ?> - <?php echo date("g:i A", strtotime($other_booking['end_time'])); ?></span>
                                        </div>
                                        <div class="property-status <?php echo strtolower($other_booking['booking_status']); ?> small">
                                            <?php echo ucfirst($other_booking['booking_status']); ?>
                                        </div>
                                    </a>
                                </li>
                                <?php endwhile; ?>
                            </ul>
                            <?php
                            // Count total bookings by this student
                            $count_sql = "SELECT COUNT(*) as total FROM bookings b 
                                         JOIN time_slots ts ON b.time_slot_id = ts.id 
                                         JOIN trainer_availabilities ta ON ts.trainer_availability_id = ta.id
                                         WHERE b.user_id = {$booking['user_id']} AND ta.trainer_id = $trainer_id";
                            $count_result = $connect->query($count_sql);
                            $count_row = $count_result->fetch_assoc();
                            $total_student_bookings = $count_row['total'];
                            
                            if($total_student_bookings > 5):
                            ?>
                            <div class="mt-3 text-center">
                                <a href="bookings.php?student_id=<?php echo $booking['user_id']; ?>" class="btn btn-link">
                                    View all <?php echo $total_student_bookings; ?> sessions
                                </a>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.dashboard-body -->

        <script src="vendor/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery.nice-select.min.js"></script>
        <script src="js/custom.js"></script>
    </div>
</body>
</html> 