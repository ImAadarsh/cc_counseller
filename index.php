<?php
include "include/session.php";
include "include/config.php";
include "include/connect.php";

// Require login to access this page
require_trainer_login();

// Get trainer ID from session
$trainer_id = get_trainer_id();

// Get stats for dashboard cards
$today = date('Y-m-d');

// Total bookings
$total_bookings_sql = "SELECT COUNT(*) as total FROM bookings b 
                      JOIN time_slots ts ON b.time_slot_id = ts.id 
                      JOIN trainer_availabilities ta ON ts.trainer_availability_id = ta.id
                      WHERE ta.trainer_id = $trainer_id";
$total_bookings_result = $connect->query($total_bookings_sql);
$total_bookings = $total_bookings_result->fetch_assoc()['total'];

// Pending bookings
$pending_bookings_sql = "SELECT COUNT(*) as total FROM bookings b 
                        JOIN time_slots ts ON b.time_slot_id = ts.id 
                        JOIN trainer_availabilities ta ON ts.trainer_availability_id = ta.id
                        WHERE ta.trainer_id = $trainer_id AND b.status = 'pending'";
$pending_bookings_result = $connect->query($pending_bookings_sql);
$pending_bookings = $pending_bookings_result->fetch_assoc()['total'];

// Total time slots
$time_slots_sql = "SELECT COUNT(*) as total FROM time_slots ts 
                  JOIN trainer_availabilities ta ON ts.trainer_availability_id = ta.id
                  WHERE ta.trainer_id = $trainer_id";
$time_slots_result = $connect->query($time_slots_sql);
$total_time_slots = $time_slots_result->fetch_assoc()['total'];

// Upcoming bookings
$upcoming_bookings_sql = "SELECT COUNT(*) as total FROM bookings b 
                         JOIN time_slots ts ON b.time_slot_id = ts.id 
                         JOIN trainer_availabilities ta ON ts.trainer_availability_id = ta.id
                         WHERE ta.trainer_id = $trainer_id AND ta.date >= '$today' AND b.status = 'confirmed'";
$upcoming_bookings_result = $connect->query($upcoming_bookings_sql);
$upcoming_bookings = $upcoming_bookings_result->fetch_assoc()['total'];

// Pagination settings
$records_per_page = 15;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $records_per_page;

// Date filter
$date_filter_start = isset($_GET['date_filter_start']) ? $_GET['date_filter_start'] : '';
$date_filter_end = isset($_GET['date_filter_end']) ? $_GET['date_filter_end'] : '';
$date_filter_sql = "";

if ($date_filter_start && $date_filter_end) {
    $date_filter_sql = " AND ta.date BETWEEN '$date_filter_start' AND '$date_filter_end'";
} elseif ($date_filter_start) {
    $date_filter_sql = " AND ta.date >= '$date_filter_start'";
} elseif ($date_filter_end) {
    $date_filter_sql = " AND ta.date <= '$date_filter_end'";
}

// Status filter
$status_filter = isset($_GET['status']) ? $_GET['status'] : '';
$status_filter_sql = "";
if ($status_filter) {
    $status_filter_sql = " AND b.status = '$status_filter'";
}

// Sorting
$sort_by = isset($_GET['sort']) ? $_GET['sort'] : 'closest';
$sort_sql = "";

switch ($sort_by) {
    case 'closest':
        $sort_sql = "ORDER BY ABS(DATEDIFF(ta.date, '$today')), CASE WHEN ta.date >= '$today' THEN 0 ELSE 1 END, ta.date ASC";
        break;
    case 'newest':
        $sort_sql = "ORDER BY b.created_at DESC";
        break;
    case 'oldest':
        $sort_sql = "ORDER BY b.created_at ASC";
        break;
    case 'status':
        $sort_sql = "ORDER BY b.status ASC";
        break;
    default:
        $sort_sql = "ORDER BY ABS(DATEDIFF(ta.date, '$today')), CASE WHEN ta.date >= '$today' THEN 0 ELSE 1 END, ta.date ASC";
}

// Count total records
$count_sql = "SELECT COUNT(*) as total FROM bookings b 
              JOIN time_slots ts ON b.time_slot_id = ts.id 
              JOIN trainer_availabilities ta ON ts.trainer_availability_id = ta.id
              JOIN users u ON b.user_id = u.id
              WHERE ta.trainer_id = $trainer_id" . $status_filter_sql . $date_filter_sql;
$count_result = $connect->query($count_sql);
$count_row = $count_result->fetch_assoc();
$total_records = $count_row['total'];
$total_pages = ceil($total_records / $records_per_page);

// Fetch bookings data
$sql = "SELECT b.id as booking_id, b.status as booking_status, b.booking_notes, b.created_at as booking_date,
        ts.id as slot_id, ts.start_time, ts.end_time, ts.duration_minutes, ts.price,
        ta.date,
        u.id as user_id, u.first_name, u.last_name, u.email, u.mobile, u.school, u.grade
        FROM bookings b 
        JOIN time_slots ts ON b.time_slot_id = ts.id 
        JOIN trainer_availabilities ta ON ts.trainer_availability_id = ta.id
        JOIN users u ON b.user_id = u.id
        WHERE ta.trainer_id = $trainer_id" . $status_filter_sql . $date_filter_sql . " 
        $sort_sql
        LIMIT $offset, $records_per_page";

$results = $connect->query($sql);

// Handle actions (update status)
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'update_status' && isset($_POST['booking_id']) && isset($_POST['status'])) {
        $booking_id = (int)$_POST['booking_id'];
        $status = $connect->real_escape_string($_POST['status']);
        
        $update_sql = "UPDATE bookings SET status = '$status' WHERE id = $booking_id";
        $connect->query($update_sql);
        
        // Redirect to refresh the page
        header("Location: bookings.php");
        exit;
    }
}

// Get recent reviews
$recent_reviews_sql = "SELECT tr.id, tr.rating, tr.review, tr.created_at,
                      u.id as user_id, u.first_name, u.last_name
                      FROM trainer_reviews tr 
                      JOIN users u ON tr.user_id = u.id
                      WHERE tr.trainer_id = $trainer_id 
                      ORDER BY tr.created_at DESC
                      LIMIT 3";

$recent_reviews_result = $connect->query($recent_reviews_sql);
$recent_reviews = [];

if ($recent_reviews_result->num_rows > 0) {
    while ($row = $recent_reviews_result->fetch_assoc()) {
        $recent_reviews[] = [
            'name' => $row['first_name'] . ' ' . $row['last_name'],
            'date' => date("M d", strtotime($row['created_at'])),
            'rating' => $row['rating'],
            'text' => $row['review']
        ];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include "include/meta.php" ?>

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
<br>
<br>
                <h2 class="main-title d-block d-lg-none">My Bookings</h2>
                
                <!-- Dashboard Stats Cards -->
                <div class="bg-white border-20">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="dash-card-one bg-white border-30 position-relative mb-15 skew-none">
                                <div class="d-sm-flex align-items-center justify-content-between">
                                    <div class="icon rounded-circle d-flex align-items-center justify-content-center order-sm-1"><img src="../images/lazy.svg" data-src="images/icon/icon_12.svg" alt="" class="lazy-img"></div>
                                    <div class="order-sm-0">
                                        <span>Total Bookings</span>
                                        <div class="value fw-500"><?php echo $total_bookings; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="dash-card-one bg-white border-30 position-relative mb-15">
                                <div class="d-sm-flex align-items-center justify-content-between">
                                    <div class="icon rounded-circle d-flex align-items-center justify-content-center order-sm-1"><img src="../images/lazy.svg" data-src="images/icon/icon_13.svg" alt="" class="lazy-img"></div>
                                    <div class="order-sm-0">
                                        <span>Pending Bookings</span>
                                        <div class="value fw-500"><?php echo $pending_bookings; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="dash-card-one bg-white border-30 position-relative mb-15">
                                <div class="d-sm-flex align-items-center justify-content-between">
                                    <div class="icon rounded-circle d-flex align-items-center justify-content-center order-sm-1"><img src="../images/lazy.svg" data-src="images/icon/icon_14.svg" alt="" class="lazy-img"></div>
                                    <div class="order-sm-0">
                                        <span>Time Slots</span>
                                        <div class="value fw-500"><?php echo $total_time_slots; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="dash-card-one bg-white border-30 position-relative mb-15">
                                <div class="d-sm-flex align-items-center justify-content-between">
                                    <div class="icon rounded-circle d-flex align-items-center justify-content-center order-sm-1"><img src="../images/lazy.svg" data-src="images/icon/icon_15.svg" alt="" class="lazy-img"></div>
                                    <div class="order-sm-0">
                                        <span>Upcoming Sessions</span>
                                        <div class="value fw-500"><?php echo $upcoming_bookings; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Filter Controls -->
                <div class="row mb-4 mt-4">
                    <div class="col-md-6 mb-3">
                        <form method="GET" class="d-flex flex-wrap">
                            <div class="me-2 mb-2">
                                <label class="form-label">From Date</label>
                                <input type="date" name="date_filter_start" class="form-control" value="<?php echo $date_filter_start; ?>">
                            </div>
                            <div class="me-2 mb-2">
                                <label class="form-label">To Date</label>
                                <input type="date" name="date_filter_end" class="form-control" value="<?php echo $date_filter_end; ?>">
                            </div>
                            <div class="me-2 mb-2">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="">All Statuses</option>
                                    <option value="pending" <?php echo $status_filter == 'pending' ? 'selected' : ''; ?>>Pending</option>
                                    <option value="confirmed" <?php echo $status_filter == 'confirmed' ? 'selected' : ''; ?>>Confirmed</option>
                                    <option value="completed" <?php echo $status_filter == 'completed' ? 'selected' : ''; ?>>Completed</option>
                                    <option value="cancelled" <?php echo $status_filter == 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                                </select>
                            </div>
                            <div class="d-flex align-items-end mb-2">
                                <input type="hidden" name="sort" value="<?php echo $sort_by; ?>">
                                <button type="submit" class="btn btn-primary me-2">Filter</button>
                                <?php if($date_filter_start || $date_filter_end || $status_filter): ?>
                                    <a href="bookings.php" class="btn btn-outline-secondary">Clear</a>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex justify-content-md-end align-items-end h-100">
                            <div class="short-filter d-flex align-items-center">
                                <div class="fs-16 me-2">Sort by:</div>
                                <select class="nice-select" id="sort-select" onchange="window.location.href='?sort='+this.value+'&status=<?php echo $status_filter; ?>&date_filter_start=<?php echo $date_filter_start; ?>&date_filter_end=<?php echo $date_filter_end; ?>'">
                                    <option value="closest" <?php echo $sort_by == 'closest' ? 'selected' : ''; ?>>Closest Date</option>
                                    <option value="newest" <?php echo $sort_by == 'newest' ? 'selected' : ''; ?>>Newest</option>
                                    <option value="oldest" <?php echo $sort_by == 'oldest' ? 'selected' : ''; ?>>Oldest</option>
                                    <option value="status" <?php echo $sort_by == 'status' ? 'selected' : ''; ?>>Status</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row gx-xxl-5 pt-15 lg-pt-10">
                    <div class="col-xl-8">
                        <div class="bg-white card-box p0 border-20">
                            <div class="d-sm-flex align-items-center justify-content-between mb-25 p-3 border-bottom">
                                <div class="fs-16">Showing <span class="color-dark fw-500"><?php echo $total_records > 0 ? $offset+1 : 0; ?>–<?php echo min($offset+$records_per_page, $total_records); ?></span> of <span class="color-dark fw-500"><?php echo $total_records; ?></span> results</div>
                            </div>
                            <div class="table-responsive pt-25 pb-25 pe-4 ps-4">
                                <table class="table booking-list-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Booking Details</th>
                                            <th scope="col">Student</th>
                                            <th scope="col">Date & Time</th>
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
                                                $booking_date = date("d M, Y", strtotime($row['booking_date']));
                                                
                                                // Format time
                                                $start_time = date("h:i A", strtotime($row['start_time']));
                                                $end_time = date("h:i A", strtotime($row['end_time']));
                                                
                                                // Status class
                                                $status_class = '';
                                                if ($row['booking_status'] == 'confirmed') {
                                                    $status_class = 'active';
                                                } elseif ($row['booking_status'] == 'pending') {
                                                    $status_class = 'pending';
                                                } elseif ($row['booking_status'] == 'cancelled') {
                                                    $status_class = 'processing';
                                                } elseif ($row['booking_status'] == 'completed') {
                                                    $status_class = 'completed';
                                                }
                                                
                                                // Check if date is in the future
                                                $is_future = strtotime($row['date']) >= strtotime(date('Y-m-d'));
                                        ?>
                                        <tr <?php echo $is_future ? 'class="table-success"' : ''; ?>>
										<td>
                                                <div class="d-flex flex-column">
                                                    <span class="fw-500 fs-18">Booking #<?php echo $row['booking_id']; ?></span>
                                                    <span class="text-muted">Created: <?php echo $booking_date; ?></span>
                                                    <span class="price color-dark mt-2">$<?php echo number_format($row['price'], 2); ?></span>
                                                    <?php if($row['booking_notes']): ?>
                                                        <span class="mt-2 small"><strong>Notes:</strong> <?php echo $row['booking_notes']; ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <span class="fw-500"><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></span>
                                                    <span class="text-muted"><?php echo $row['email']; ?></span>
                                                    <span class="text-muted"><?php echo $row['mobile']; ?></span>
                                                    <?php if($row['school']): ?>
                                                        <span class="text-muted"><?php echo $row['school']; ?>, Grade <?php echo $row['grade']; ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <span class="fw-500"><?php echo $date; ?></span>
                                                    <span class="text-muted"><?php echo $start_time; ?> - <?php echo $end_time; ?></span>
                                                    <span class="text-muted"><?php echo $row['duration_minutes']; ?> minutes</span>
                                                </div>
                                            </td>
                                            <td><div class="property-status <?php echo strtolower($status_class); ?>"><?php echo ucfirst($row['booking_status']); ?></div></td>
                                            <td>
                                                <div class="action-dots float-end">
                                                    <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <span></span>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li>
                                                            <a class="dropdown-item" href="view_booking.php?id=<?php echo $row['booking_id']; ?>">
                                                                <img src="../images/lazy.svg" data-src="images/icon/icon_20.svg" alt="" class="lazy-img"> View Details
                                                            </a>
                                                        </li>
                                                        <li class="dropdown-submenu">
                                                            <a class="dropdown-item dropdown-toggle" href="#">
                                                                <img src="../images/lazy.svg" data-src="images/icon/icon_19.svg" alt="" class="lazy-img"> Update Status
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <form method="post">
                                                                        <input type="hidden" name="action" value="update_status">
                                                                        <input type="hidden" name="booking_id" value="<?php echo $row['booking_id']; ?>">
                                                                        <input type="hidden" name="status" value="pending">
                                                                        <button type="submit" class="dropdown-item">Pending</button>
                                                                    </form>
                                                                </li>
                                                                <li>
                                                                    <form method="post">
                                                                        <input type="hidden" name="action" value="update_status">
                                                                        <input type="hidden" name="booking_id" value="<?php echo $row['booking_id']; ?>">
                                                                        <input type="hidden" name="status" value="confirmed">
                                                                        <button type="submit" class="dropdown-item">Confirm</button>
                                                                    </form>
                                                                </li>
                                                                <li>
                                                                    <form method="post">
                                                                        <input type="hidden" name="action" value="update_status">
                                                                        <input type="hidden" name="booking_id" value="<?php echo $row['booking_id']; ?>">
                                                                        <input type="hidden" name="status" value="completed">
                                                                        <button type="submit" class="dropdown-item">Complete</button>
                                                                    </form>
                                                                </li>
                                                                <li>
                                                                    <form method="post">
                                                                        <input type="hidden" name="action" value="update_status">
                                                                        <input type="hidden" name="booking_id" value="<?php echo $row['booking_id']; ?>">
                                                                        <input type="hidden" name="status" value="cancelled">
                                                                        <button type="submit" class="dropdown-item">Cancel</button>
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
                                            echo '<tr><td colspan="5" class="text-center">No bookings found</td></tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>                    
                        </div>
                    </div>
                    
                    <div class="col-xl-4">
					<div class="recent-job-tab bg-white border-20 mt-30 plr w-100">
						<h5 class="dash-title-two">Recent Reviews</h5>
						<div class="review-wrapper">
							<?php foreach($recent_reviews as $review): ?>
							<div class="review border-bottom pb-20 mb-20">
								<div class="text">
									<div class="d-flex justify-content-between">
										<h6 class="name"><?php echo $review['name']; ?></h6>
										<div class="date"><?php echo $review['date']; ?></div>
									</div>
									<ul class="rating style-none d-flex mt-5">
										<?php for ($i = 1; $i <= 5; $i++): ?>
											<li><i class="fa-sharp fa-solid fa-star <?php echo $i <= $review['rating'] ? 'text-warning' : 'text-muted'; ?>"></i></li>
										<?php endfor; ?>
									</ul>
									<p class="mt-10"><?php echo substr($review['text'], 0, 100); ?><?php echo (strlen($review['text']) > 100) ? '...' : ''; ?></p>
								</div>
							</div>
							<?php endforeach; ?>
							
							<?php if (empty($recent_reviews)): ?>
							<div class="text-center py-4">No reviews yet</div>
							<?php endif; ?>
							
							<div class="text-end mt-10">
								<a href="reviews.php" class="fw-500">View All Reviews</a>
							</div>
						</div>
					</div>

                        
                        <div class="bg-white border-20 mt-30 plr pb-30">
                            <h5 class="dash-title-two">Booking Status</h5>
                            <div class="chart-wrapper mt-30">
                                <canvas id="booking-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Pagination -->
                <?php if ($total_pages > 1): ?>
                <ul class="pagination-one d-flex align-items-center justify-content-center style-none pt-40">
                    <?php if ($page > 1): ?>
                    <li><a href="?page=1&sort=<?php echo $sort_by; ?>&status=<?php echo $status_filter; ?>&date_filter_start=<?php echo $date_filter_start; ?>&date_filter_end=<?php echo $date_filter_end; ?>">1</a></li>
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
                            echo '<li><a href="?page=' . $i . '&sort=' . $sort_by . '&status=' . $status_filter . '&date_filter_start=' . $date_filter_start . '&date_filter_end=' . $date_filter_end . '">' . $i . '</a></li>';
                        }
                    }
                    
                    if ($end_page < $total_pages - 1) {
                        echo '<li>...</li>';
                    }
                    
                    if ($total_pages > 1 && $page != $total_pages) {
                        echo '<li><a href="?page=' . $total_pages . '&sort=' . $sort_by . '&status=' . $status_filter . '&date_filter_start=' . $date_filter_start . '&date_filter_end=' . $date_filter_end . '">' . $total_pages . '</a></li>';
                    }
                    ?>
                    
                    <?php if ($page < $total_pages): ?>
                    <li class="ms-2"><a href="?page=<?php echo $page+1; ?>&sort=<?php echo $sort_by; ?>&status=<?php echo $status_filter; ?>&date_filter_start=<?php echo $date_filter_start; ?>&date_filter_end=<?php echo $date_filter_end; ?>" class="d-flex align-items-center">Next <img src="../images/icon/icon_46.svg" alt="" class="ms-2"></a></li>
                    <?php endif; ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
        <!-- /.dashboard-body -->

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
        <!-- Chart js -->
        <script src="../vendor/chart.js"></script>

        <!-- Theme js -->
        <script src="../js/theme.js"></script>
        
        <script>
            $(document).ready(function() {
                // Initialize nice select
                $('.nice-select').niceSelect();
                
                // Highlight future dates
                const today = new Date();
                today.setHours(0, 0, 0, 0);
                
                $('tr').each(function() {
                    const dateText = $(this).find('.fw-500').first().text();
                    if (dateText) {
                        const rowDate = new Date(dateText);
                        if (rowDate >= today) {
                            $(this).addClass('table-success');
                        }
                    }
                });
                
                // Booking status chart
                const ctx = document.getElementById('booking-chart').getContext('2d');
                const bookingChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Pending', 'Confirmed', 'Completed', 'Cancelled'],
                        datasets: [{
                            data: [<?php echo $pending_bookings; ?>, 
                                  <?php echo $upcoming_bookings; ?>, 
                                  <?php echo $total_bookings - $pending_bookings - $upcoming_bookings; ?>, 
                                  0],
                            backgroundColor: [
                                '#fff3cd',
                                '#d1e7dd',
                                '#cfe2ff',
                                '#f8d7da'
                            ],
                            borderColor: [
                                '#856404',
                                '#0f5132',
                                '#084298',
                                '#842029'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'bottom',
                            }
                        }
                    }
                });
            });
        </script>
    </div> <!-- /.main-page-wrapper -->
</body>
</html>

