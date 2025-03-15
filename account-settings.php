<!DOCTYPE html>
<html lang="en">


<?php include "include/meta.php" ?>
<body>
	<div class="main-page-wrapper">
		<!-- ===================================================
			Loading Transition
		==================================================== -->
		<div id="preloader">
			<div id="ctn-preloader" class="ctn-preloader">
				<div class="icon"><img src="../images/loader.gif" alt="" class="m-auto d-block" width="250"></div>
			</div>
		</div>

		<!-- 
		=============================================
			Dashboard Aside Menu
		============================================== 
		-->
		<?php include "include/aside.php" ?>
		<!-- /.dash-aside-navbar -->

		<!-- 
		=============================================
			Dashboard Body
		============================================== 
		-->
		<div class="dashboard-body">
			<div class="position-relative">
				<!-- ************************ Header **************************** -->
				<?php include "include/header.php" ?>
				<!-- End Header -->

				<h2 class="main-title d-block d-lg-none">Account Settings</h2>

				<div class="bg-white card-box border-20">
                    <h4 class="dash-title-three">Edit & Update</h4>
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="dash-input-wrapper mb-20">
                                    <label for="">First Name</label>
                                    <input type="text" placeholder="Rashed">
                                </div>
                                <!-- /.dash-input-wrapper -->
                            </div>
                            <div class="col-lg-6">
                                <div class="dash-input-wrapper mb-20">
                                    <label for="">Last Name</label>
                                    <input type="text" placeholder="Kabir">
                                </div>
                                <!-- /.dash-input-wrapper -->
                            </div>
                            <div class="col-12">
                                <div class="dash-input-wrapper mb-20">
                                    <label for="">Email</label>
                                    <input type="email" placeholder="rshakbair365@gmal.com">
                                </div>
                                <!-- /.dash-input-wrapper -->
                            </div>
                            <div class="col-12">
                                <div class="dash-input-wrapper mb-20">
                                    <label for="">Phone Number</label>
                                    <input type="tel" placeholder="+810 321 889 021">
                                </div>
                                <!-- /.dash-input-wrapper -->
                            </div>
                            <div class="col-12">
                                <div class="dash-input-wrapper mb-20">
                                    <label for="">Password</label>
                                    <input type="password">

                                    <div class="info-text d-sm-flex align-items-center justify-content-between mt-5">
                                        <p class="m0">Want to change the password? <a href="account-settings(pass-change).php">Click here</a></p>
                                        <a href="account-settings(pass-change).php" class="chng-pass">Change Password</a>
                                    </div>
                                </div>
                                <!-- /.dash-input-wrapper -->
                            </div>
                        </div>

                        <div class="button-group d-inline-flex align-items-center mt-30">
                            <a href="#" class="dash-btn-two tran3s me-3">Save</a>
                            <a href="#" class="dash-cancel-btn tran3s">Cancel</a>
                        </div>	
                    </form>
                </div>
				<!-- /.card-box -->				
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
						<p>Are you sure to delete your account? All data will be lost.</p>
						<div class="button-group d-inline-flex justify-content-center align-items-center pt-15">
							<a href="#" class="confirm-btn fw-500 tran3s me-3">Yes</a>
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




		<!-- Optional JavaScript _____________________________  -->

		<!-- jQuery first, then Bootstrap JS -->
		<!-- jQuery -->
		<script src="../vendor/jquery.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- WOW js -->
		<script src="../vendor/wow/wow.min.js"></script>
		<!-- Slick Slider -->
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
	</div> <!-- /.main-page-wrapper -->
</body>

</html>