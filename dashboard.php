<?php
require_once 'include/session.php';
require_trainer_login(); // Redirect if not logged in

$trainer_name = get_trainer_name();
$trainer_id = get_trainer_id();
$trainer_token = get_trainer_token();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Trainer Appointment Booking System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="main-page-wrapper">
        <!-- Loading Transition -->
        <!-- <div id="preloader">
            <div id="ctn-preloader" class="ctn-preloader">
                <div class="icon"><img src="../images/loader.gif" alt="" class="m-auto d-block" width="250"></div>
            </div>
        </div> -->

        <!-- Dashboard Aside Menu -->
        <aside class="dash-aside-navbar">
            <div class="position-relative">
                <div class="logo">
                    <a href="index.php">
                        <img src="../assets/img/logo/logo.svg" alt="Logo">
                    </a>
                    <button class="close-btn"><i class="fa-light fa-circle-xmark"></i></button>
                </div>
                <div class="blur-content">
                    <nav class="dasboard-main-nav">
                        <ul class="style-none">
                            <li><a class="active" href="dashboard.php">
                                <i class="fas fa-home"></i>
                                <span>Dashboard</span></a>
                            </li>
                            <li><a href="availability.php">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Manage Availability</span>
                            </a></li>
                        </ul>
                    </nav>
                    <div class="nav-title">Bookings</div>
                    <nav class="dasboard-main-nav">
                        <ul class="style-none">
                            <li><a href="upcoming-bookings.php">
                                <i class="fas fa-calendar-check"></i>
                                <span>Upcoming Bookings</span>
                            </a></li>
                            <li><a href="past-bookings.php">
                                <i class="fas fa-history"></i>
                                <span>Past Bookings</span>
                            </a></li>
                        </ul>
                    </nav>
                    <div class="nav-title">Account</div>
                    <nav class="dasboard-main-nav">
                        <ul class="style-none">
                            <li><a href="profile.php">
                                <i class="fas fa-user"></i>
                                <span>My Profile</span>
                            </a></li>
                            <li><a href="settings.php">
                                <i class="fas fa-cog"></i>
                                <span>Settings</span>
                            </a></li>
                        </ul>
                    </nav>
                </div>
                <div class="logout-section">
                    <a href="logout.php" class="logout-btn">
                        <div class="icon">
                            <i class="fas fa-sign-out-alt"></i>
                        </div>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </aside>

        <!-- Dashboard Body -->
        <div class="dashboard-body">
            <div class="position-relative">
                <!-- Header -->
                <header class="dashboard-header">
                    <div class="d-flex align-items-center justify-content-end">
                        <h4 class="m0 d-none d-lg-block">Dashboard</h4>
                        <button class="dash-mobile-nav-toggler d-block d-md-none me-auto">
                            <span></span>
                        </button>
                        <div class="d-none d-md-block me-3">
                            <a href="../index.php" class="btn-two"><span>Return Home</span> <i class="fa-thin fa-arrow-up-right"></i></a>
                        </div>
                        <div class="user-data">
                            <div class="name"><?php echo htmlspecialchars($trainer_name); ?></div>
                        </div>
                    </div>
                </header>

                <!-- Dashboard Content -->
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="bg-white card-box border-20 p-4">
                                <h2>Welcome, <?php echo htmlspecialchars($trainer_name); ?>!</h2>
                                <p>This is your trainer dashboard where you can manage your availability and bookings.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/custom.js"></script>
</body>
</html>
