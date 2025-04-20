<!DOCTYPE html>
<html lang="en">

<?php
require_once 'include/session.php';
require_once 'include/config.php';
require_trainer_login(); // Redirect if not logged in
include "include/meta.php" ?>

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

				<h2 class="main-title d-block d-lg-none">Trainer Profile</h2>

				<form action="controller/update_profile.php" method="POST" enctype="multipart/form-data">
					<div class="bg-white card-box border-20">
						<h4 class="dash-title-three">Profile Information</h4>
						<div class="user-avatar-setting d-flex align-items-center mb-30">
							<img src="<?php echo IMAGE_URL; echo isset($_SESSION['trainer_profile_img']) ? $_SESSION['trainer_profile_img'] : 'images/loader.gif'; ?>" alt="Trainer Profile" class="lazy-img user-img">
							<div class="upload-btn position-relative tran3s ms-4 me-3">
								Upload profile photo
								<input type="file" id="profile_img" name="profile_img">
							</div>
							<button type="button" class="delete-btn tran3s" id="delete-profile-img">Delete</button>
						</div>
						<!-- /.user-avatar-setting -->
						<div class="row">
							<div class="col-sm-6">
								<div class="dash-input-wrapper mb-30">
									<label for="first_name">First Name*</label>
									<input type="text" id="first_name" name="first_name" value="<?php echo isset($_SESSION['trainer_first_name']) ? $_SESSION['trainer_first_name'] : ''; ?>" placeholder="Your First Name" required>
								</div>
								<!-- /.dash-input-wrapper -->
							</div>
							<div class="col-sm-6">
								<div class="dash-input-wrapper mb-30">
									<label for="last_name">Last Name*</label>
									<input type="text" id="last_name" name="last_name" value="<?php echo isset($_SESSION['trainer_last_name']) ? $_SESSION['trainer_last_name'] : ''; ?>" placeholder="Your Last Name" required>
								</div>
								<!-- /.dash-input-wrapper -->
							</div>
							<div class="col-sm-6">
								<div class="dash-input-wrapper mb-30">
									<label for="email">Email*</label>
									<input type="email" id="email" name="email" value="<?php echo isset($_SESSION['trainer_email']) ? $_SESSION['trainer_email'] : ''; ?>" placeholder="Your Email Address" required>
								</div>
								<!-- /.dash-input-wrapper -->
							</div>
							<div class="col-sm-6">
								<div class="dash-input-wrapper mb-30">
									<label for="designation">Designation*</label>
									<input type="text" id="designation" name="designation" value="<?php echo isset($_SESSION['trainer_designation']) ? $_SESSION['trainer_designation'] : ''; ?>" placeholder="e.g. Fitness Trainer, Yoga Instructor" required>
								</div>
								<!-- /.dash-input-wrapper -->
							</div>
							<div class="col-sm-6">
								<div class="dash-input-wrapper mb-30">
									<label for="mobile">Mobile Number*</label>
									<input type="tel" id="mobile" name="mobile" value="<?php echo isset($_SESSION['trainer_mobile']) ? $_SESSION['trainer_mobile'] : ''; ?>" placeholder="Your Mobile Number" required>
								</div>
								<!-- /.dash-input-wrapper -->
							</div>
							<div class="col-12">
								<div class="dash-input-wrapper mb-30">
									<label for="short_about">Short Bio*</label>
									<input type="text" id="short_about" name="short_about" value="<?php echo isset($_SESSION['trainer_short_about']) ? $_SESSION['trainer_short_about'] : ''; ?>" placeholder="Brief intro (max 500 characters)" maxlength="500">
								</div>
								<!-- /.dash-input-wrapper -->
							</div>
							<div class="col-12">
								<div class="dash-input-wrapper">
									<label for="about">About*</label>
									<textarea id="about" name="about" class="size-lg" placeholder="Detailed description about your experience, qualifications, and training approach"><?php echo isset($_SESSION['trainer_about']) ? $_SESSION['trainer_about'] : ''; ?></textarea>
									<div class="alert-text">Provide comprehensive information about your expertise and training style.</div>
								</div>
								<!-- /.dash-input-wrapper -->
							</div>
						</div>
					</div>
					<!-- /.card-box -->

					<div class="bg-white card-box border-20 mt-40">
						<h4 class="dash-title-three">Hero Image</h4>
						<div class="user-avatar-setting d-flex align-items-center mb-30">
							<img src="<?php echo IMAGE_URL; echo isset($_SESSION['trainer_hero_img']) ? $_SESSION['trainer_hero_img'] : 'images/hero_default.jpg'; ?>" alt="Hero Image" class="lazy-img user-img">
							<div class="upload-btn position-relative tran3s ms-4 me-3">
								Upload hero image
								<input type="file" id="hero_img" name="hero_img">
							</div>
							<button type="button" class="delete-btn tran3s" id="delete-hero-img">Delete</button>
						</div>
						<div class="alert-text">This image will be displayed on your public profile page. Recommended size: 1200x600px</div>
					</div>
					<!-- /.card-box -->

					<div class="bg-white card-box border-20 mt-40">
						<h4 class="dash-title-three">Specializations</h4>
						<div id="specializations-container">
							<!-- Specializations will be loaded dynamically -->
							<div class="text-center py-4" id="no-specializations" style="display:none;">
								<p class="text-muted">No specializations added yet</p>
							</div>
						</div>
						<div class="dash-input-wrapper mb-20">
							<label for="new_specialization">Add New Specialization</label>
							<div class="d-flex">
								<input type="text" id="new_specialization" placeholder="e.g. Yoga, Weight Training, Cardio">
								<button type="button" class="dash-btn-one ms-2" id="add-specialization"><i class="bi bi-plus"></i> Add</button>
							</div>
						</div>
					</div>
					<!-- /.card-box -->

					<div class="button-group d-inline-flex align-items-center mt-30">
						<button type="submit" class="dash-btn-two tran3s me-3">Save Changes</button>
						<a href="dashboard.php" class="dash-cancel-btn tran3s">Cancel</a>
					</div>
				</form>
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
		<script src="js/trainer-profile.js"></script>
	</div> <!-- /.main-page-wrapper -->
</body>

</html>
