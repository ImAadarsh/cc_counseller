<?php
include "include/session.php";
include "include/config.php";
include "include/connect.php";

// Require login to access this page
require_trainer_login();

// Get trainer ID from session
$trainer_id = get_trainer_id();

// Pagination settings
$records_per_page = 15;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $records_per_page;

// Date filter
$date_filter = isset($_GET['date_filter']) ? $_GET['date_filter'] : '';
$date_filter_sql = "";
if ($date_filter) {
    $date_filter_sql = " AND ta.date = '$date_filter'";
}

// Sorting
$sort_by = isset($_GET['sort']) ? $_GET['sort'] : 'future_first';
$sort_sql = "";

switch ($sort_by) {
    case 'newest':
        $sort_sql = "ORDER BY ta.date DESC, ts.start_time DESC";
        break;
    case 'oldest':
        $sort_sql = "ORDER BY ta.date ASC, ts.start_time ASC";
        break;
    case 'price_high':
        $sort_sql = "ORDER BY ts.price DESC";
        break;
    case 'price_low':
        $sort_sql = "ORDER BY ts.price ASC";
        break;
    case 'future_first':
        $sort_sql = "ORDER BY CASE WHEN ta.date >= CURDATE() THEN 0 ELSE 1 END, ta.date ASC, ts.start_time ASC";
        break;
    default:
        $sort_sql = "ORDER BY CASE WHEN ta.date >= CURDATE() THEN 0 ELSE 1 END, ta.date ASC, ts.start_time ASC";
}

// Handle bulk delete
if (isset($_POST['bulk_delete']) && !empty($_POST['delete_dates'])) {
    $dates_to_delete = array();
    foreach ($_POST['delete_dates'] as $date) {
        $dates_to_delete[] = $connect->real_escape_string($date);
    }
    $dates_str = "'" . implode("','", $dates_to_delete) . "'";
    
    // Get availability IDs for the selected dates
    $avail_sql = "SELECT id FROM trainer_availabilities 
                  WHERE trainer_id = $trainer_id AND date IN ($dates_str)";
    $avail_result = $connect->query($avail_sql);
    
    if ($avail_result->num_rows > 0) {
        $avail_ids = array();
        while ($row = $avail_result->fetch_assoc()) {
            $avail_ids[] = $row['id'];
        }
        $avail_ids_str = implode(',', $avail_ids);
        
        // Delete time slots first
        $delete_slots_sql = "DELETE FROM time_slots 
                            WHERE trainer_availability_id IN ($avail_ids_str)";
        $connect->query($delete_slots_sql);
        
        // Then delete availabilities
        $delete_avail_sql = "DELETE FROM trainer_availabilities 
                            WHERE id IN ($avail_ids_str)";
        $connect->query($delete_avail_sql);
        
        // Redirect to refresh the page
        header("Location: timeslots.php?deleted=1");
        exit;
    }
}

// Count total records
$count_sql = "SELECT COUNT(*) as total FROM trainer_availabilities ta 
              JOIN time_slots ts ON ta.id = ts.trainer_availability_id 
              WHERE ta.trainer_id = $trainer_id" . $date_filter_sql;
$count_result = $connect->query($count_sql);
$count_row = $count_result->fetch_assoc();
$total_records = $count_row['total'];
$total_pages = ceil($total_records / $records_per_page);

// Fetch availability data with time slots
$sql = "SELECT ta.id as availability_id, ta.date, ts.id as slot_id, ts.start_time, ts.end_time, 
        ts.duration_minutes, ts.price, ts.status,
        (SELECT COUNT(*) FROM bookings WHERE time_slot_id = ts.id) as view_count
        FROM trainer_availabilities ta 
        JOIN time_slots ts ON ta.id = ts.trainer_availability_id 
        WHERE ta.trainer_id = $trainer_id" . $date_filter_sql . " 
        $sort_sql
        LIMIT $offset, $records_per_page";

$results = $connect->query($sql);

// Get unique dates for bulk delete
$dates_sql = "SELECT DISTINCT ta.date FROM trainer_availabilities ta 
              WHERE ta.trainer_id = $trainer_id
              ORDER BY ta.date";
$dates_result = $connect->query($dates_sql);
$available_dates = array();
while ($date_row = $dates_result->fetch_assoc()) {
    $available_dates[] = $date_row['date'];
}

// Handle actions (delete, update status)
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'delete' && isset($_POST['slot_id'])) {
        $slot_id = (int)$_POST['slot_id'];
        $delete_sql = "DELETE FROM time_slots WHERE id = $slot_id";
        $connect->query($delete_sql);
        
        // Check if this was the last time slot for this availability
        $check_sql = "SELECT COUNT(*) as slot_count FROM time_slots WHERE trainer_availability_id = 
                     (SELECT trainer_availability_id FROM time_slots WHERE id = $slot_id)";
        $check_result = $connect->query($check_sql);
        $check_row = $check_result->fetch_assoc();
        
        if ($check_row['slot_count'] == 0) {
            // Delete the availability entry too
            $delete_avail_sql = "DELETE FROM trainer_availabilities WHERE id = 
                               (SELECT trainer_availability_id FROM time_slots WHERE id = $slot_id)";
            $connect->query($delete_avail_sql);
        }
        
        // Redirect to refresh the page
        header("Location: timeslots.php");
        exit;
    }
    
    if ($_POST['action'] == 'update_status' && isset($_POST['slot_id']) && isset($_POST['status'])) {
        $slot_id = (int)$_POST['slot_id'];
        $status = $connect->real_escape_string($_POST['status']);
        
        $update_sql = "UPDATE time_slots SET status = '$status' WHERE id = $slot_id";
        $connect->query($update_sql);
        
        // Redirect to refresh the page
        header("Location: timeslots.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include "include/meta.php" ?>
<style>
    /* Reset and base styles */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
  color: #333;
  background-color: #f5f7fa;
  line-height: 1.6;
}

/* Dashboard layout improvements */
.dashboard-body {
  padding: 25px;
  transition: all 0.3s ease;
}

/* Card styling */
.card-box {
  border-radius: 12px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
  transition: all 0.3s ease;
  overflow: hidden;
}

.card-box:hover {
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

/* Table improvements */
.property-list-table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0;
}

.property-list-table th {
  background-color: #f8f9fa;
  font-weight: 600;
  padding: 15px;
  text-align: left;
  color: #495057;
  border-bottom: 1px solid #e9ecef;
}

.property-list-table td {
  padding: 15px;
  vertical-align: middle;
  border-bottom: 1px solid #e9ecef;
}

.property-list-table tbody tr:hover {
  background-color: #f8f9fa;
}

/* Status badges */
.property-status {
  display: inline-block;
  padding: 5px 12px;
  border-radius: 20px;
  font-size: 12px;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  background-color: #e9ecef;
}

.property-status.active {
  background-color: #d1e7dd;
  color: #0f5132;
}

.property-status.pending {
  background-color: #fff3cd;
  color: #856404;
}

.property-status.processing {
  background-color: #cfe2ff;
  color: #084298;
}

/* Date and time styling */
.property-name {
  font-size: 16px !important;
  font-weight: 600;
  color: #212529;
  text-decoration: none;
  transition: color 0.2s ease;
}

.property-name:hover {
  color: #0d6efd;
}

.address {
  color: #6c757d;
  font-size: 14px;
  margin-top: 3px;
}

.price {
  display: block;
  margin-top: 5px;
  font-weight: 600;
  color: #0d6efd;
}

/* Action buttons */
.action-btn {
  background: transparent;
  border: none;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: background-color 0.2s ease;
}

.action-btn:hover {
  background-color: #f1f3f5;
}

.dropdown-menu {
  border-radius: 8px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  border: none;
  padding: 8px 0;
}

.dropdown-item {
  padding: 8px 15px;
  font-size: 14px;
  color: #495057;
  transition: background-color 0.2s ease;
}

.dropdown-item:hover {
  background-color: #f8f9fa;
  color: #0d6efd;
}

/* Pagination styling */
.pagination-one {
  margin-top: 30px;
}

.pagination-one li {
  margin: 0 5px;
}

.pagination-one li a {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  border-radius: 8px;
  background-color: #fff;
  color: #495057;
  font-weight: 500;
  text-decoration: none;
  transition: all 0.2s ease;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
}

.pagination-one li.active a,
.pagination-one li a:hover {
  background-color: #0d6efd;
  color: #fff;
}

/* Filter and sort controls */
.form-control {
  height: 45px;
  border-radius: 8px;
  border: 1px solid #ced4da;
  padding: 0 15px;
  font-size: 14px;
  transition: border-color 0.2s ease;
}

.form-control:focus {
  border-color: #0d6efd;
  box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
  outline: none;
}

.btn {
  height: 45px;
  border-radius: 8px;
  padding: 0 20px;
  font-weight: 500;
  transition: all 0.2s ease;
  display: inline-flex;
  align-items: center;
  justify-content: center;
}

.btn-primary {
  background-color: #0d6efd;
  border-color: #0d6efd;
  color: #fff;
}

.btn-primary:hover {
  background-color: #0b5ed7;
  border-color: #0a58ca;
}

.btn-danger {
  background-color: #dc3545;
  border-color: #dc3545;
  color: #fff;
}

.btn-danger:hover {
  background-color: #bb2d3b;
  border-color: #b02a37;
}

/* Future dates highlighting */
tr.table-success {
  background-color: rgba(25, 135, 84, 0.1);
}

tr.table-success:hover {
  background-color: rgba(25, 135, 84, 0.15);
}

/* Responsive improvements */
@media (max-width: 768px) {
  .dashboard-body {
    padding: 15px;
  }
  
  .property-list-table th,
  .property-list-table td {
    padding: 10px;
  }
  
  .form-control, .btn {
    height: 40px;
  }
}

</style>
<body>
    <div class="main-page-wrapper">
        <!-- Loading Transition -->
        <div id="preloader">
            <div id="ctn-preloader" class="ctn-preloader">
                <div class="icon"><img src="../images/loader.gif" alt="" class="m-auto d-block" width="250"></div>
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

                <h2 style="margin-top: 100px;" class="main-title d-block d-lg-none">My Availability</h2>
                
                <!-- Date Filter and Bulk Delete -->
                <div style="margin-top: 100px;"  class="row mb-4">
                    <div class="col-md-6">
                        <form method="GET" class="d-flex">
                            <input type="date" name="date_filter" class="form-control me-2" value="<?php echo $date_filter; ?>">
                            <input type="hidden" name="sort" value="<?php echo $sort_by; ?>">
                            <input type="hidden" name="page" value="1">
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <?php if($date_filter): ?>
                                <a href="timeslots.php" class="btn btn-outline-secondary ms-2">Clear</a>
                            <?php endif; ?>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form method="POST" id="bulk-delete-form">
                            <div class="input-group">
                                <select name="delete_dates[]" class="form-control" >
                                    <?php foreach($available_dates as $date): ?>
                                        <option value="<?php echo $date; ?>"><?php echo date("d M, Y", strtotime($date)); ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <button type="submit" name="bulk_delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete all time slots for the selected dates?')">Delete Selected Dates</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="d-sm-flex align-items-center justify-content-between mb-25">
                    <div class="fs-16">Showing <span class="color-dark fw-500"><?php echo $offset+1; ?>–<?php echo min($offset+$records_per_page, $total_records); ?></span> of <span class="color-dark fw-500"><?php echo $total_records; ?></span> results</div>
                    <div class="d-flex ms-auto xs-mt-30">
                        <!-- <div class="short-filter d-flex align-items-center ms-sm-auto">
                            <div class="fs-16 me-2">Sort by:</div>
                            <select class="nice-select" id="sort-select" onchange="window.location.href='?sort='+this.value+'&date_filter=<?php echo $date_filter; ?>'">
                                <option value="future_first" <?php echo $sort_by == 'future_first' ? 'selected' : ''; ?>>Future First</option>
                                <option value="newest" <?php echo $sort_by == 'newest' ? 'selected' : ''; ?>>Newest</option>
                                <option value="oldest" <?php echo $sort_by == 'oldest' ? 'selected' : ''; ?>>Oldest</option>
                                <option value="price_high" <?php echo $sort_by == 'price_high' ? 'selected' : ''; ?>>Price High</option>
                                <option value="price_low" <?php echo $sort_by == 'price_low' ? 'selected' : ''; ?>>Price Low</option>
                            </select>
                        </div> -->
                    </div>
                </div>

                <?php if(isset($_GET['deleted']) && $_GET['deleted'] == 1): ?>
                <div class="alert alert-success">Selected dates and time slots have been deleted successfully.</div>
                <?php endif; ?>

                <div class="bg-white card-box p0 border-20">
                    <div class="table-responsive pt-25 pb-25 pe-4 ps-4">
                        <table class="table property-list-table">
                            <thead>
                                <tr>
                                    <!-- <th scope="col">Select</th> -->
                                    <th scope="col">Date & Time</th>
                                    <th scope="col">Duration</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="border-0">
                                <?php
                                if ($results->num_rows > 0) {
                                    while ($row = $results->fetch_assoc()) {
                                        // Format date
                                        $date = date("d M, Y", strtotime($row['date']));
                                        
                                        // Format time
                                        $start_time = date("h:i A", strtotime($row['start_time']));
                                        $end_time = date("h:i A", strtotime($row['end_time']));
                                        
                                        // Status class
                                        $status_class = '';
                                        if ($row['status'] == 'Active') {
                                            $status_class = '';
                                        } elseif ($row['status'] == 'Pending') {
                                            $status_class = 'pending';
                                        } elseif ($row['status'] == 'Processing') {
                                            $status_class = 'processing';
                                        }
                                        
                                        // Check if date is in the future
                                        $is_future = strtotime($row['date']) >= strtotime(date('Y-m-d'));
                                ?>
                                <tr <?php echo $is_future ? 'class="table-success"' : ''; ?>>
                                    <!-- <td>
                                        <input type="checkbox" form="bulk-delete-form" name="delete_dates[]" value="<?php echo $row['date']; ?>">
                                    </td> -->
                                    <td>
                                        <div class="d-lg-flex align-items-center position-relative">
                                            <div class="ps-lg-4 md-pt-10">
                                                <a href="#" class="property-name tran3s color-dark fw-500 fs-20 stretched-link"><?php echo $date; ?></a>
                                                <div class="address"><?php echo $start_time; ?> - <?php echo $end_time; ?></div>
                                                <strong class="price color-dark">$<?php echo number_format($row['price'], 2); ?></strong>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?php echo $row['duration_minutes']; ?> minutes</td>
                                    <td><div class="property-status <?php echo strtolower($status_class); ?>"><?php echo $row['status']; ?></div></td>
                                    <td>
                                        <div class="action-dots float-end">
                                            <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a class="dropdown-item" href="edit_time_slot.php?id=<?php echo $row['slot_id']; ?>">
                                                        <img src="../images/lazy.svg" data-src="images/icon/icon_20.svg" alt="" class="lazy-img"> Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <form method="post" style="display:inline;">
                                                        <input type="hidden" name="action" value="delete">
                                                        <input type="hidden" name="slot_id" value="<?php echo $row['slot_id']; ?>">
                                                        <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this time slot?')">
                                                            <img src="../images/lazy.svg" data-src="images/icon/icon_21.svg" alt="" class="lazy-img"> Delete
                                                        </button>
                                                    </form>
                                                </li>
                                                <li class="dropdown-submenu">
                                                    <a class="dropdown-item dropdown-toggle" href="#">
                                                        <img src="../images/lazy.svg" data-src="images/icon/icon_19.svg" alt="" class="lazy-img"> Status
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <form method="post">
                                                                <input type="hidden" name="action" value="update_status">
                                                                <input type="hidden" name="slot_id" value="<?php echo $row['slot_id']; ?>">
                                                                <input type="hidden" name="status" value="Active">
                                                                <button type="submit" class="dropdown-item">Active</button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form method="post">
                                                                <input type="hidden" name="action" value="update_status">
                                                                <input type="hidden" name="slot_id" value="<?php echo $row['slot_id']; ?>">
                                                                <input type="hidden" name="status" value="Pending">
                                                                <button type="submit" class="dropdown-item">Pending</button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form method="post">
                                                                <input type="hidden" name="action" value="update_status">
                                                                <input type="hidden" name="slot_id" value="<?php echo $row['slot_id']; ?>">
                                                                <input type="hidden" name="status" value="Processing">
                                                                <button type="submit" class="dropdown-item">Processing</button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    echo '<tr><td colspan="5" class="text-center">No availability slots found</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- /.table property-list-table -->
                    </div>                    
                </div>
                <!-- /.card-box -->

                <!-- Pagination -->
                <?php if ($total_pages > 1): ?>
                <ul class="pagination-one d-flex align-items-center justify-content-center style-none pt-40">
                    <?php if ($page > 1): ?>
                    <li><a href="?page=1&sort=<?php echo $sort_by; ?>&date_filter=<?php echo $date_filter; ?>">1</a></li>
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
                            echo '<li><a href="?page=' . $i . '&sort=' . $sort_by . '&date_filter=' . $date_filter . '">' . $i . '</a></li>';
                        }
                    }
                    
                    if ($end_page < $total_pages - 1) {
                        echo '<li>...</li>';
                    }
                    
                    if ($total_pages > 1 && $page != $total_pages) {
                        echo '<li><a href="?page=' . $total_pages . '&sort=' . $sort_by . '&date_filter=' . $date_filter . '">' . $total_pages . '</a></li>';
                    }
                    ?>
                    
                    <?php if ($page < $total_pages): ?>
                    <li class="ms-2"><a href="?page=<?php echo $page+1; ?>&sort=<?php echo $sort_by; ?>&date_filter=<?php echo $date_filter; ?>" class="d-flex align-items-center">Next <img src="../images/icon/icon_46.svg" alt="" class="ms-2"></a></li>
                    <?php endif; ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
        <!-- /.dashboard-body -->

        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                <div class="container">
                    <div class="remove-account-popup text-center modal-content">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <img src="../images/lazy.svg" data-src="images/icon/icon_22.svg" alt="" class="lazy-img m-auto">
                        <h2>Are you sure?</h2>
                        <p>Are you sure you want to delete this time slot?</p>
                        <div class="button-group d-inline-flex justify-content-center align-items-center pt-15">
                            <a href="#" id="confirm-delete" class="confirm-btn fw-500 tran3s me-3">Yes</a>
                            <button type="button" class="btn-close fw-500 ms-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                        </div>
                    </div>
                    <!-- /.remove-account-popup -->
                </div>
            </div>
        </div>

        <button class="scroll-top">
            <i class="bi bi-arrow-up-short"></i>
        </button>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Bootstrap JS -->
        <script src="../vendor/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../vendor/wow/wow.min.js"></script>
        <script src="../vendor/slick/slick.min.js"></script>
        <!-- Fancybox -->
        <script src="../vendor/fancybox/fancybox.umd.js"></script>
        <!-- Lazy -->
        <script src="../vendor/jquery.lazy.min.js"></script>
        <!-- js Counter -->
        <script src="../vendor/jquery.counterup.min.js"></script>
        <script src="../vendor/jquery.waypoints.min.js"></script>
        <!-- Nice Select -->
        <script src="../vendor/nice-select/jquery.nice-select.min.js"></script>
        <!-- validator js -->
        <script src="../vendor/validator.js"></script>

        <!-- Theme js -->
        <script src="../js/theme.js"></script>
        
        <script>
            // Handle sort select change
            $(document).ready(function() {
                // Initialize nice select
                $('.nice-select').niceSelect();
                
                // Handle sort change
                $('#sort-select').on('change', function() {
                    window.location.href = 'timeslots.php?sort=' + $(this).val() + '&date_filter=<?php echo $date_filter; ?>';
                });
                
                // Highlight future dates
                const today = new Date();
                today.setHours(0, 0, 0, 0);
                
                $('tr').each(function() {
                    const dateText = $(this).find('.property-name').text();
                    if (dateText) {
                        const rowDate = new Date(dateText);
                        if (rowDate >= today) {
                            $(this).addClass('table-success');
                        }
                    }
                });
            });
        </script>
    </div> <!-- /.main-page-wrapper -->
</body>
</html>

