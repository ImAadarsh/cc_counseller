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

				<h2 class="main-title d-block d-lg-none">Saved Search</h2>

				<div class="bg-white card-box p0 border-20">
                    <div class="table-responsive pt-25 pb-25 pe-4 ps-4">
                        <table class="table saved-search-table">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="border-0"> 
                                <tr>
                                    <td><a href="#" class="property-name tran3s color-dark fw-500">Galaxy Family Home</a></td>
                                    <td>13 Sep, 2023</td>
                                    <td>
										<div class="d-flex justify-content-end btns-group">
											<a href="#"><i class="fa-sharp fa-regular fa-eye" data-bs-toggle="tooltip" title="View"></i></a>
											<a href="#" data-bs-toggle="tooltip" title="Delete"><i class="fa-regular fa-trash"></i></a>
										</div>
									</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="property-name tran3s color-dark fw-500">Big Apartments</a></td>
                                    <td>27 Aug, 2023</td>
                                    <td>
										<div class="d-flex justify-content-end btns-group">
											<a href="#"><i class="fa-sharp fa-regular fa-eye" data-bs-toggle="tooltip" title="View"></i></a>
											<a href="#" data-bs-toggle="tooltip" title="Delete"><i class="fa-regular fa-trash"></i></a>
										</div>
									</td>
                                </tr>
								<tr>
                                    <td><a href="#" class="property-name tran3s color-dark fw-500">Villa in California with pool</a></td>
                                    <td>16 Jun, 2023</td>
                                    <td>
										<div class="d-flex justify-content-end btns-group">
											<a href="#"><i class="fa-sharp fa-regular fa-eye" data-bs-toggle="tooltip" title="View"></i></a>
											<a href="#" data-bs-toggle="tooltip" title="Delete"><i class="fa-regular fa-trash"></i></a>
										</div>
									</td>
                                </tr>
								<tr>
                                    <td><a href="#" class="property-name tran3s color-dark fw-500">Small Houses</a></td>
                                    <td>4 Apr, 2023</td>
                                    <td>
										<div class="d-flex justify-content-end btns-group">
											<a href="#"><i class="fa-sharp fa-regular fa-eye" data-bs-toggle="tooltip" title="View"></i></a>
											<a href="#" data-bs-toggle="tooltip" title="Delete"><i class="fa-regular fa-trash"></i></a>
										</div>
									</td>
                                </tr>
								<tr>
                                    <td><a href="#" class="property-name tran3s color-dark fw-500">Flat for Rent USA</a></td>
                                    <td>14 Feb, 2023</td>
                                    <td>
										<div class="d-flex justify-content-end btns-group">
											<a href="#"><i class="fa-sharp fa-regular fa-eye" data-bs-toggle="tooltip" title="View"></i></a>
											<a href="#" data-bs-toggle="tooltip" title="Delete"><i class="fa-regular fa-trash"></i></a>
										</div>
									</td>
                                </tr>
								<tr>
                                    <td><a href="#" class="property-name tran3s color-dark fw-500">Apartments Near Market</a></td>
                                    <td>8 Jan, 2023</td>
                                    <td>
										<div class="d-flex justify-content-end btns-group">
											<a href="#"><i class="fa-sharp fa-regular fa-eye" data-bs-toggle="tooltip" title="View"></i></a>
											<a href="#" data-bs-toggle="tooltip" title="Delete"><i class="fa-regular fa-trash"></i></a>
										</div>
									</td>
                                </tr>
								<tr>
                                    <td><a href="#" class="property-name tran3s color-dark fw-500">Home for Rent</a></td>
                                    <td>15 Dec, 2022</td>
                                    <td>
										<div class="d-flex justify-content-end btns-group">
											<a href="#"><i class="fa-sharp fa-regular fa-eye" data-bs-toggle="tooltip" title="View"></i></a>
											<a href="#" data-bs-toggle="tooltip" title="Delete"><i class="fa-regular fa-trash"></i></a>
										</div>
									</td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- /.table saved-search-table -->
                    </div>                    
                </div>
				<!-- /.card-box -->

				<ul class="pagination-one d-flex align-items-center style-none pt-40">
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li>....</li>
                    <li class="ms-2"><a href="#" class="d-flex align-items-center">Last <img src="../images/icon/icon_46.svg" alt="" class="ms-2"></a></li>
                </ul>	
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