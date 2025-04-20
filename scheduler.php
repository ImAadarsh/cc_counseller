<!DOCTYPE html>
<html lang="en">

<?php
require_once 'include/session.php';
require_once 'include/config.php';
require_trainer_login(); // Redirect if not logged in?>
<head>
	<meta charset="UTF-8">
	<meta name="keywords" content="Real estate, Property sale, Property buy">
	<meta name="description" content="Homy is a beautiful website template designed for Real Estate Agency.">
    <meta property="og:site_name" content="Homy">
    <meta property="og:url" content="https://creativegigstf.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Homy-Real Estate HTML5 Template & Dashboard">
	<meta name='og:image' content='images/assets/ogg.png'>
	<!-- For IE -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- For Resposive Device -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- For Window Tab Color -->
	<!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="#0D1A1C">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#0D1A1C">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#0D1A1C">
	<title>Homy-Real Estate HTML5 Template & Dashboard</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" sizes="56x56" href="images/fav-icon/icon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="all">
	<!-- Main style sheet -->
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
	<!-- responsive style sheet -->
	<link rel="stylesheet" type="text/css" href="css/responsive.css" media="all">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_blue.css">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Flatpickr for date/time selection -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/themes/material_blue.min.css">
	<link rel="stylesheet" href="css/scheduler.css">
	<!-- Fix Internet Explorer ______________________________________-->
	<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="vendor/html5shiv.js"></script>
			<script src="vendor/respond.js"></script>
		<![endif]-->
		

</head>


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

				<div class="main-content p-4">
                    <h4 class="mb-4">Manage Your Availability & Time Slots</h4>
                    
                    <ul class="nav nav-tabs mb-4" id="availabilityTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="calendar-tab" data-bs-toggle="tab" data-bs-target="#calendar" type="button" role="tab" aria-controls="calendar" aria-selected="true">Calendar View</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="bulk-tab" data-bs-toggle="tab" data-bs-target="#bulk" type="button" role="tab" aria-controls="bulk" aria-selected="false">Bulk Management</button>
                        </li>
                        
                    </ul>
                    
                    <div class="tab-content" id="availabilityTabContent">
                        <!-- Calendar View Tab -->
                        <div class="tab-pane fade show active" id="calendar" role="tabpanel" aria-labelledby="calendar-tab">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Select Dates</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="calendar-container" id="availability-calendar"></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-7">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Selected Date: <span id="selected-date-display">None</span></h5>
                                        </div>
                                        <div class="card-body">
                                            <div id="no-date-selected" class="text-center py-4">
                                                <p class="text-muted">Please select a date from the calendar to manage time slots</p>
                                            </div>
                                            
                                            <div id="date-selected-content" style="display: none;">
                                                <div class="mb-3">
                                                    <label class="form-label">Time Slot Duration</label>
                                                    <select class="form-select" id="time-slot-duration">
                                                        <option value="30">30 minutes</option>
                                                        <option value="45">45 minutes</option>
                                                        <option value="60" selected>1 hour</option>
                                                        <option value="90">1.5 hours</option>
                                                        <option value="120">2 hours</option>
                                                        <option value="custom">Custom</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label class="form-label">Working Hours</label>
                                                    <div class="row g-2">
                                                        <div class="col">
                                                            <input type="text" class="form-control" id="start-time" placeholder="Start Time">
                                                        </div>
                                                        <div class="col">
                                                            <input type="text" class="form-control" id="end-time" placeholder="End Time">
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" id="trainer_token" value="<?php echo get_trainer_token(); ?>">
												<input type="hidden" id="trainer_id" value="<?php echo get_trainer_id(); ?>">

                                                <div class="mb-3">
                                                    <label class="form-label">Break Time (Optional)</label>
                                                    <div class="row g-2">
                                                        <div class="col">
                                                            <input type="text" class="form-control" id="break-start" placeholder="Start Time">
                                                        </div>
                                                        <div class="col">
                                                            <input type="text" class="form-control" id="break-end" placeholder="End Time">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label class="form-label">Price per Time Slot (₹)</label>
                                                    <input type="number" class="form-control" id="slot-price" value="500">
                                                </div>
                                                
                                                <button class="btn btn-primary w-100" id="generate-slots">Generate Time Slots</button>
                                                
                                                <div class="mt-4">
                                                    <!-- <h6>Generated Time Slots</h6> -->
													<div class="d-flex justify-content-between mb-2">
														<h6>Generated Time Slots</h6>
														<div>
															<button type="button" class="btn btn-sm btn-outline-primary select-all-slots">Select All</button>
															<button type="button" class="btn btn-sm btn-outline-secondary deselect-all-slots">Deselect All</button>
														</div>
													</div>
                                                    <div class="time-slots-container" id="time-slots-container">
                                                        <!-- Time slots will be generated here -->
                                                    </div>
                                                </div>
                                                
                                                <div class="d-grid gap-2 mt-3">
                                                    <button class="btn btn-success" id="save-time-slots">Save Time Slots</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Bulk Management Tab -->
                        <div class="tab-pane fade" id="bulk" role="tabpanel" aria-labelledby="bulk-tab">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Bulk Date Selection</h5>
                                </div>
                                <div class="card-body">
                                    <div class="date-selection-type">
                                        <div class="btn-group" role="group">
                                            <input type="radio" class="btn-check" name="date-selection-type" id="date-selection-single" autocomplete="off" checked>
                                            <label class="btn btn-outline-primary" for="date-selection-single">Single Dates</label>
                                            
                                            <input type="radio" class="btn-check" name="date-selection-type" id="date-selection-range" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="date-selection-range">Date Range</label>
                                            
                                            <input type="radio" class="btn-check" name="date-selection-type" id="date-selection-weekday" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="date-selection-weekday">Weekdays</label>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-3 mb-3" id="single-dates-container">
                                        <label class="form-label">Select Multiple Dates</label>
                                        <input type="text" class="form-control" id="bulk-dates-picker" placeholder="Click to select dates">
                                    </div>
                                    
                                    <div id="date-range-container" style="display: none;">
                                        <div class="row mt-3">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Start Date</label>
                                                <input type="text" class="form-control" id="range-start-date" placeholder="Select start date">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">End Date</label>
                                                <input type="text" class="form-control" id="range-end-date" placeholder="Select end date">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div id="weekday-container" style="display: none;">
                                        <label class="form-label mt-3">Select Weekdays</label>
                                        <div class="mb-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="weekday-mon" value="1">
                                                <label class="form-check-label" for="weekday-mon">Mon</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="weekday-tue" value="2">
                                                <label class="form-check-label" for="weekday-tue">Tue</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="weekday-wed" value="3">
                                                <label class="form-check-label" for="weekday-wed">Wed</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="weekday-thu" value="4">
                                                <label class="form-check-label" for="weekday-thu">Thu</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="weekday-fri" value="5">
                                                <label class="form-check-label" for="weekday-fri">Fri</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="weekday-sat" value="6">
                                                <label class="form-check-label" for="weekday-sat">Sat</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="weekday-sun" value="0">
                                                <label class="form-check-label" for="weekday-sun">Sun</label>
                                            </div>
                                        </div>
                                        
                                    
										
                                        
                                        <div class="mb-3">
                                            <label class="form-label">For the selected dates, apply the following time slots:</label>
                                        </div>
                                    </div>
                                    
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Time Slot Configuration</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label class="form-label">Time Slot Duration</label>
                                                <select class="form-select" id="bulk-time-slot-duration">
                                                    <option value="30">30 minutes</option>
                                                    <option value="45">45 minutes</option>
                                                    <option value="60" selected>1 hour</option>
                                                    <option value="90">1.5 hours</option>
                                                    <option value="120">2 hours</option>
                                                </select>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label class="form-label">Working Hours</label>
                                                <div class="row g-2">
                                                    <div class="col">
                                                        <input type="text" class="form-control" id="bulk-start-time" placeholder="Start Time">
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" class="form-control" id="bulk-end-time" placeholder="End Time">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label class="form-label">Break Time (Optional)</label>
                                                <div class="row g-2">
                                                    <div class="col">
                                                        <input type="text" class="form-control" id="bulk-break-start" placeholder="Start Time">
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" class="form-control" id="bulk-break-end" placeholder="End Time">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label class="form-label">Price per Time Slot (₹)</label>
                                                <input type="number" class="form-control" id="bulk-slot-price" value="500">
                                            </div>
                                            
                                            <div class="selected-dates mb-3">
                                                <h6>Selected Dates</h6>
                                                <div id="selected-dates-list">
                                                    <div class="text-muted">No dates selected yet</div>
                                                </div>
                                            </div>
                                            
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-primary" id="bulk-generate-slots">Generate Time Slots</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card mb-4" id="bulk-preview-card" style="display: none;">
									<div class="card-header d-flex justify-content-between align-items-center">
										<h5 class="card-title mb-0">Preview Generated Time Slots</h5>
										<div>
											<button type="button" class="btn btn-sm btn-outline-primary bulk-select-all">Select All</button>
											<button type="button" class="btn btn-sm btn-outline-secondary bulk-deselect-all">Deselect All</button>
										</div>
									</div>
                                        <div class="card-body">
                                            <div id="bulk-preview-container">
                                                <!-- Preview of generated time slots will appear here -->
                                            </div>
                                            
                                            <div class="d-grid gap-2 mt-3">
                                                <button class="btn btn-success" id="bulk-save-slots">Save All Time Slots</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                               
                            </div>
                        </div>
                    </div>
        </div>

				
			</div>
		</div>
		<!-- /.dashboard-body -->

		<button class="scroll-top">
			<i class="bi bi-arrow-up-short"></i>
		</button>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Bootstrap JS -->
		<script src="vendor/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- WOW js -->
		<script src="vendor/wow/wow.min.js"></script>
		<!-- Slick Slider -->
		<script src="vendor/slick/slick.min.js"></script>
		<!-- Fancybox -->
		<script src="vendor/fancybox/fancybox.umd.js"></script>
		<!-- Lazy -->
		<script src="vendor/jquery.lazy.min.js"></script>
		<!-- js Counter -->
		<script src="vendor/jquery.counterup.min.js"></script>
		<script src="vendor/jquery.waypoints.min.js"></script>
		<!-- Nice Select -->
		<script src="vendor/nice-select/jquery.nice-select.min.js"></script>
		<!-- validator js -->
		<script src="vendor/validator.js"></script>

		<!-- Theme js -->
		<script src="../js/theme.js"></script>
				<!-- JavaScript Libraries -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
		<script src="js/scheduler.js"></script>


                
        
	</div> <!-- /.main-page-wrapper -->
</body>

</html>
