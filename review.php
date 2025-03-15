<?php
include "include/session.php";
include "include/config.php";
include "include/connect.php";

// Require login to access this page
require_trainer_login();

// Get trainer ID from session
$trainer_id = get_trainer_id();

// Pagination settings
$records_per_page = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $records_per_page;

// Sorting
$sort_by = isset($_GET['sort']) ? $_GET['sort'] : 'newest';
$sort_sql = "";

switch ($sort_by) {
    case 'newest':
        $sort_sql = "ORDER BY tr.created_at DESC";
        break;
    case 'oldest':
        $sort_sql = "ORDER BY tr.created_at ASC";
        break;
    case 'rating_high':
        $sort_sql = "ORDER BY tr.rating DESC";
        break;
    case 'rating_low':
        $sort_sql = "ORDER BY tr.rating ASC";
        break;
    default:
        $sort_sql = "ORDER BY tr.created_at DESC";
}

// Count total records
$count_sql = "SELECT COUNT(*) as total FROM trainer_reviews tr 
              WHERE tr.trainer_id = $trainer_id";
$count_result = $connect->query($count_sql);
$count_row = $count_result->fetch_assoc();
$total_records = $count_row['total'];
$total_pages = ceil($total_records / $records_per_page);

// Get average rating
$avg_rating_sql = "SELECT AVG(rating) as avg_rating FROM trainer_reviews 
                  WHERE trainer_id = $trainer_id";
$avg_rating_result = $connect->query($avg_rating_sql);
$avg_rating = $avg_rating_result->fetch_assoc()['avg_rating'];
$avg_rating = round($avg_rating, 1);

// Fetch reviews data
$sql = "SELECT tr.id, tr.booking_id, tr.rating, tr.review, tr.created_at,
        u.id as user_id, u.first_name, u.last_name
        FROM trainer_reviews tr 
        JOIN users u ON tr.user_id = u.id
        WHERE tr.trainer_id = $trainer_id 
        $sort_sql
        LIMIT $offset, $records_per_page";
// echo $sql;
$results = $connect->query($sql);
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

                <h2 class="main-title d-block d-lg-none">Reviews</h2>

                <div class="d-sm-flex align-items-center justify-content-between mb-25 mt-100">
                    <div class="fs-16">Showing <span class="color-dark fw-500"><?php echo $offset+1; ?>–<?php echo min($offset+$records_per_page, $total_records); ?></span> of <span class="color-dark fw-500"><?php echo $total_records; ?></span> results</div>
                    <div class="d-flex ms-auto xs-mt-30">
                        <!-- <div class="short-filter d-flex align-items-center ms-sm-auto">
                            <div class="fs-16 me-2">Sort by:</div>
                            <select class="nice-select" id="sort-select">
                                <option value="newest" <?php echo $sort_by == 'newest' ? 'selected' : ''; ?>>Newest</option>
                                <option value="oldest" <?php echo $sort_by == 'oldest' ? 'selected' : ''; ?>>Oldest</option>
                                <option value="rating_high" <?php echo $sort_by == 'rating_high' ? 'selected' : ''; ?>>Rating High</option>
                                <option value="rating_low" <?php echo $sort_by == 'rating_low' ? 'selected' : ''; ?>>Rating Low</option>
                            </select>
                        </div> -->
                    </div>
                </div>

                <div class="bg-white card-box pt-0 border-20">
                    <div class="theme-details-one">
                        <div class="review-panel-one">
                            <div class="position-relative z-1">
                                <div class="review-wrapper">
                                    <?php
                                    if ($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            // Format date
                                            $review_date = date("d M, Y", strtotime($row['created_at']));
                                            
                                            // Default profile image if none exists
                                            // $profile_img = $row['profile_img'] ? $row['profile_img'] : '../images/media/img_01.jpg';
                                    ?>
                                    <div class="review">
                                        <img src="cc_s.png" alt="" class="rounded-circle avatar">
                                        <div class="text">
                                            <div class="d-sm-flex justify-content-between">
                                                <div>
                                                    <h6 class="name"><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></h6>
                                                    <div class="time fs-16"><?php echo $review_date; ?></div>
                                                </div>
                                                <ul class="rating style-none d-flex xs-mt-10">
                                                    <li><span class="fst-italic me-2">(<?php echo $row['rating']; ?> Rating)</span></li>
                                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                                        <li><i class="fa-sharp fa-solid fa-star <?php echo $i <= $row['rating'] ? 'text-warning' : 'text-muted'; ?>"></i></li>
                                                    <?php endfor; ?>
                                                </ul>
                                            </div>
                                            <p class="fs-20 mt-20 mb-30"><?php echo $row['review']; ?></p>
                                            <div class="d-flex review-help-btn">
                                                <a href="#" class="me-5"><i class="fa-sharp fa-regular fa-thumbs-up"></i> <span>Helpful</span></a>
                                                <a href="#" class="me-5"><i class="fa-sharp fa-regular fa-flag-swallowtail"></i> <span>Flag</span></a>
                                                <a href="#"><i class="fa-sharp fa-regular fa-reply"></i> <span>Reply</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    } else {
                                        echo '<div class="text-center p-5">No reviews found</div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-box -->

                <!-- Pagination -->
                <?php if ($total_pages > 1): ?>
                <ul class="pagination-one d-flex align-items-center justify-content-center style-none pt-40">
                    <?php if ($page > 1): ?>
                    <li><a href="?page=1&sort=<?php echo $sort_by; ?>">1</a></li>
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
                            echo '<li><a href="?page=' . $i . '&sort=' . $sort_by . '">' . $i . '</a></li>';
                        }
                    }
                    
                    if ($end_page < $total_pages - 1) {
                        echo '<li>...</li>';
                    }
                    
                    if ($total_pages > 1 && $page != $total_pages) {
                        echo '<li><a href="?page=' . $total_pages . '&sort=' . $sort_by . '">' . $total_pages . '</a></li>';
                    }
                    ?>
                    
                    <?php if ($page < $total_pages): ?>
                    <li class="ms-2"><a href="?page=<?php echo $page+1; ?>&sort=<?php echo $sort_by; ?>" class="d-flex align-items-center">Next <img src="../images/icon/icon_46.svg" alt="" class="ms-2"></a></li>
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

        <!-- Theme js -->
        <script src="../js/theme.js"></script>
        
        <script>
            $(document).ready(function() {
                // Initialize nice select
                $('.nice-select').niceSelect();
                
                // Handle sort change
                $('#sort-select').on('change', function() {
                    window.location.href = 'reviews.php?sort=' + $(this).val();
                });
            });
        </script>
    </div> <!-- /.main-page-wrapper -->
</body>
</html>
