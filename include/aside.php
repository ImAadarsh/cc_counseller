<?php
// Get current page filename
$current_page = basename($_SERVER['PHP_SELF']);
?>

<aside class="dash-aside-navbar">
    <div class="position-relative">
        <div class="logo d-md-block d-flex align-items-center justify-content-between plr bottom-line pb-30">
            <a style="text-decoration: none;"  href="index.php">
                <img src="../assets/img/logo/logo.svg" alt="">
            </a>
            <button class="close-btn d-block d-md-none"><i class="fa-light fa-circle-xmark"></i></button>
        </div>
        <nav class="dasboard-main-nav pt-30 pb-30 bottom-line">
            <ul class="style-none">
                <li class="plr">
                    <a style="text-decoration: none;"  href="index.php" class="d-flex w-100 align-items-center <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">
                        <img src="images/icon/icon_1.svg" alt="">
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="plr">
                    <a style="text-decoration: none;"  href="bookings.php" class="d-flex w-100 align-items-center <?php echo ($current_page == 'bookings.php') ? 'active' : ''; ?>">
                        <img src="images/icon/icon_38.svg" alt="">
                        <span>Bookings</span>
                    </a>
                </li>
                <li class="bottom-line pt-30 lg-pt-20 mb-40 lg-mb-30"></li>
                <li><div class="nav-title">Control Board</div></li>
                
                <li class="plr">
                    <a style="text-decoration: none;" href="scheduler.php" class="d-flex w-100 align-items-center <?php echo ($current_page == 'scheduler.php') ? 'active' : ''; ?>">
                        <img src="images/icon/icon_7.svg" alt="">
                        <span>Add Timeslots</span>
                    </a>
                </li>
                <li class="plr">
                    <a style="text-decoration: none;"  href="timeslots.php" class="d-flex w-100 align-items-center <?php echo ($current_page == 'timeslots.php') ? 'active' : ''; ?>">
                        <img src="images/icon/icon_5.svg" alt="">
                        <span>View TimeSlot</span>
                    </a>
                </li>
                <li class="plr">
                    <a style="text-decoration: none;"  href="reschedule.php" class="d-flex w-100 align-items-center <?php echo ($current_page == 'reschedule.php') ? 'active' : ''; ?>">
                        <img src="images/icon/icon_4.svg" alt="">
                        <span>Reschedule</span>
                    </a>
                </li>
                <li class="plr">
                    <a style="text-decoration: none;"  href="review.php" class="d-flex w-100 align-items-center <?php echo ($current_page == 'review.php') ? 'active' : ''; ?>">
                        <img src="images/icon/icon_10.svg" alt="">
                        <span>My Reviews</span>
                    </a>
                </li>
                <li class="bottom-line pt-30 lg-pt-20 mb-40 lg-mb-30"></li>
                <li><div class="nav-title">Settings</div></li>
                <li class="plr">
                    <a style="text-decoration: none;"  href="profile.php" class="d-flex w-100 align-items-center <?php echo ($current_page == 'profile.php') ? 'active' : ''; ?>">
                        <img src="images/icon/icon_3.svg" alt="">
                        <span>Profile</span>
                    </a>
                </li>
                <li class="plr">
                    <a style="text-decoration: none;"  href="#" class="d-flex w-100 align-items-center">
                        <img src="images/icon/icon_8.svg" alt="">
                        <span>My Page</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.dasboard-main-nav -->
        <div class="profile-complete-status bottom-line pb-35 plr">
            <h6>Our Policies</h6>
            <div class="progress-line position-relative">
                <div class="inner-line" style="width:100%;"></div>
            </div>
        </div>
        <!-- /.profile-complete-status -->

        <div class="plr">
            <a style="text-decoration: none;"  href="include/logout.php" class="d-flex w-100 align-items-center logout-btn">
                <div class="icon tran3s d-flex align-items-center justify-content-center rounded-circle"><img src="images/icon/icon_41.svg" alt=""></div>
                <span>Logout</span>
            </a>
        </div>
    </div>
</aside>
