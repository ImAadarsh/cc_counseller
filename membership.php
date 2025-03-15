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

				<h2 class="main-title d-block d-lg-none">Membership</h2>

                <div class="membership-plan-wrapper mb-20">
                    <div class="row gx-0">
                        <div class="col-xxl-7 col-lg-6 d-flex flex-column">
                            <div class="column w-100 h-100">
                                <h4>Current Plan (Standard)</h4>
                                <p>Unlimited access to our legal document library and online rental application tool, billed monthly.</p>
                            </div>
                        </div>
                        <div class="col-xxl-5 col-lg-6 d-flex flex-column">
                            <div class="column border-left w-100 h-100">
                                <div class="d-flex">
                                    <h3 class="price m0">$29</h3>
                                    <div class="ps-4 flex-fill">
                                        <h6>Monthly Plan</h6>
                                        <span class="text1 d-block">Your subscription renews <span class="fw-500">July 12th, 2023</span></span>
                                        <a href="#" class="cancel-plan tran3s">Cancel Current Plan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.membership-plan-wrapper -->

				<div class="pricing-section-two">
					<div class="wrapper">
						<div class="row gx-xxl-5">
							<div class="col-xl-4 col-lg-6">
								<div class="pr-column-wrapper bg-white rounded-5 border-0 mt-30">
									<div class="pr-header text-center mb-55">
										<div class="plan fw-500 text-uppercase color-dark">FREE PLAN</div>
										<strong class="price fw-500">0</strong>
										<p class="fs-24">per user/month</p>
									</div>
									<!-- /.pr-header -->
									<ul class="style-none text-center">
										<li>60-day chat history</li>
										<li>Basic widget customization</li>
										<li class="disable">Ticketing system</li>
										<li class="disable">Data security</li>
									</ul>
									<div class="pr-footer text-center mt-60">
										<a href="#" class="btn-twelve w-100 sm">Choose Plan</a>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-lg-6">
								<div class="pr-column-wrapper bg-white rounded-5 active mt-30">
									<div class="pr-header text-center mb-55">
										<div class="plan fw-500 text-uppercase color-dark">Standard</div>
										<strong class="price fw-500">$12</strong>
										<p class="fs-24">per user/month</p>
									</div>
									<!-- /.pr-header -->
									<ul class="style-none text-center">
										<li>60-day chat history</li>
										<li>Basic widget customization</li>
										<li>Ticketing system</li>
										<li class="disable">Data security</li>
									</ul>
									<div class="pr-footer text-center mt-60">
										<a href="#" class="btn-twelve w-100 sm">Current Plan</a>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-lg-6">
								<div class="pr-column-wrapper bg-white rounded-5 border-0 mt-30">
									<div class="pr-header text-center mb-55">
										<div class="plan fw-500 text-uppercase color-dark">BUSINESS</div>
										<strong class="price fw-500">$39</strong>
										<p class="fs-24">per user/month</p>
									</div>
									<!-- /.pr-header -->
									<ul class="style-none text-center">
										<li>60-day chat history</li>
										<li>Basic widget customization</li>
										<li>Ticketing system</li>
										<li>Data security</li>
									</ul>
									<div class="pr-footer text-center mt-60">
										<a href="#" class="btn-twelve w-100 sm">Choose Plan</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
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