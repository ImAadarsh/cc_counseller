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

				<h2 class="main-title d-block d-lg-none">Favourites</h2>

				<div class="row gx-xxl-5">
                    <div class="col-lg-4 col-md-6 d-flex mb-50 wow fadeInUp">
                        <div class="listing-card-one border-25 h-100 w-100">
                            <div class="img-gallery p-15">
                                <div class="position-relative border-25 overflow-hidden">
                                    <div class="tag border-25">FOR RENT</div>
                                    <a href="#" class="fav-btn tran3s"><i class="fa-light fa-heart"></i></a>
                                    <div id="carousel1" class="carousel slide">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carousel1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carousel1" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carousel1" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active" data-bs-interval="1000000">
                                                <a href="#" class="d-block"><img src="../images/listing/img_01.jpg" class="w-100" alt="..."></a>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="1000000">
                                                <a href="#" class="d-block"><img src="../images/listing/img_01.jpg" class="w-100" alt="..."></a>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="1000000">
                                                <a href="#" class="d-block"><img src="../images/listing/img_01.jpg" class="w-100" alt="..."></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.img-gallery -->
                            <div class="property-info p-25">
                                <a href="../listing_details_03.php" class="title tran3s">Blueberry villa</a>
                                <div class="address">Mirpur 10, Stadium dhaka 1208</div>
                                <ul class="style-none feature d-flex flex-wrap align-items-center justify-content-between">
                                    <li class="d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_04.svg" alt="" class="lazy-img icon me-2">
                                        <span class="fs-16">1370 sqft</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_05.svg" alt="" class="lazy-img icon me-2">
                                        <span class="fs-16">03 bed</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_06.svg" alt="" class="lazy-img icon me-2">
                                        <span class="fs-16">02 bath</span>
                                    </li>
                                </ul>
                                <div class="pl-footer top-border d-flex align-items-center justify-content-between">
                                    <strong class="price fw-500 color-dark">$3,280/<sub>m</sub></strong>
                                    <a href="../listing_details_03.php" class="btn-four rounded-circle"><i class="bi bi-arrow-up-right"></i></a>
                                </div>
                            </div>
                            <!-- /.property-info -->
                        </div>
                        <!-- /.listing-card-one -->
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex mb-50 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="listing-card-one border-25 h-100 w-100">
                            <div class="img-gallery p-15">
                                <div class="position-relative border-25 overflow-hidden">
                                    <div class="tag sale border-25">FOR SELL</div>
                                    <a href="#" class="fav-btn tran3s"><i class="fa-light fa-heart"></i></a>
                                    <div id="carousel2" class="carousel slide">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carousel2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carousel2" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carousel2" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active" data-bs-interval="1000000">
                                                <a href="#" class="d-block"><img src="../images/listing/img_02.jpg" class="w-100" alt="..."></a>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="1000000">
                                                <a href="#" class="d-block"><img src="../images/listing/img_03.jpg" class="w-100" alt="..."></a>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="1000000">
                                                <a href="#" class="d-block"><img src="../images/listing/img_01.jpg" class="w-100" alt="..."></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.img-gallery -->
                            <div class="property-info p-25">
                                <a href="../listing_details_03.php" class="title tran3s">White House villa</a>
                                <div class="address">Muza link road, ca, usa</div>
                                <ul class="style-none feature d-flex flex-wrap align-items-center justify-content-between">
                                    <li class="d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_04.svg" alt="" class="lazy-img icon me-2">
                                        <span class="fs-16">1270 sqft</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_05.svg" alt="" class="lazy-img icon me-2">
                                        <span class="fs-16">02 bed</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_06.svg" alt="" class="lazy-img icon me-2">
                                        <span class="fs-16">02 bath</span>
                                    </li>
                                </ul>
                                <div class="pl-footer top-border d-flex align-items-center justify-content-between">
                                    <strong class="price fw-500 color-dark">$28,100.00</strong>
                                    <a href="../listing_details_03.php" class="btn-four rounded-circle"><i class="bi bi-arrow-up-right"></i></a>
                                </div>
                            </div>
                            <!-- /.property-info -->
                        </div>
                        <!-- /.listing-card-one -->
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex mb-50 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="listing-card-one border-25 h-100 w-100">
                            <div class="img-gallery p-15">
                                <div class="position-relative border-25 overflow-hidden">
                                    <div class="tag sale border-25">FOR SELL</div>
                                    <a href="#" class="fav-btn tran3s"><i class="fa-light fa-heart"></i></a>
                                    <div id="carousel3" class="carousel slide">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carousel3" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carousel3" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carousel3" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active" data-bs-interval="1000000">
                                                <a href="#" class="d-block"><img src="../images/listing/img_03.jpg" class="w-100" alt="..."></a>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="1000000">
                                                <a href="#" class="d-block"><img src="../images/listing/img_02.jpg" class="w-100" alt="..."></a>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="1000000">
                                                <a href="#" class="d-block"><img src="../images/listing/img_01.jpg" class="w-100" alt="..."></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.img-gallery -->
                            <div class="property-info p-25">
                                <a href="../listing_details_03.php" class="title tran3s">Luxury villa in Dal lake.</a>
                                <div class="address">Mirpur 10, Stadium</div>
                                <ul class="style-none feature d-flex flex-wrap align-items-center justify-content-between">
                                    <li class="d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_04.svg" alt="" class="lazy-img icon me-2">
                                        <span class="fs-16">1270 sqft</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_05.svg" alt="" class="lazy-img icon me-2">
                                        <span class="fs-16">02 bed</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_06.svg" alt="" class="lazy-img icon me-2">
                                        <span class="fs-16">02 bath</span>
                                    </li>
                                </ul>
                                <div class="pl-footer top-border d-flex align-items-center justify-content-between">
                                    <strong class="price fw-500 color-dark">$42,500.00</strong>
                                    <a href="../listing_details_03.php" class="btn-four rounded-circle"><i class="bi bi-arrow-up-right"></i></a>
                                </div>
                            </div>
                            <!-- /.property-info -->
                        </div>
                        <!-- /.listing-card-one -->
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex mb-50 wow fadeInUp">
                        <div class="listing-card-one border-25 h-100 w-100">
                            <div class="img-gallery p-15">
                                <div class="position-relative border-25 overflow-hidden">
                                    <div class="tag border-25">FOR RENT</div>
                                    <a href="#" class="fav-btn tran3s"><i class="fa-light fa-heart"></i></a>
                                    <div id="carousel4" class="carousel slide">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carousel4" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carousel4" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carousel4" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active" data-bs-interval="1000000">
                                                <a href="#" class="d-block"><img src="../images/listing/img_04.jpg" class="w-100" alt="..."></a>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="1000000">
                                                <a href="#" class="d-block"><img src="../images/listing/img_01.jpg" class="w-100" alt="..."></a>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="1000000">
                                                <a href="#" class="d-block"><img src="../images/listing/img_02.jpg" class="w-100" alt="..."></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.img-gallery -->
                            <div class="property-info p-25">
                                <a href="../listing_details_03.php" class="title tran3s">Blueberry villa</a>
                                <div class="address">Mirpur 10, Stadium dhaka 1208</div>
                                <ul class="style-none feature d-flex flex-wrap align-items-center justify-content-between">
                                    <li class="d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_04.svg" alt="" class="lazy-img icon me-2">
                                        <span class="fs-16">1370 sqft</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_05.svg" alt="" class="lazy-img icon me-2">
                                        <span class="fs-16">03 bed</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_06.svg" alt="" class="lazy-img icon me-2">
                                        <span class="fs-16">02 bath</span>
                                    </li>
                                </ul>
                                <div class="pl-footer top-border d-flex align-items-center justify-content-between">
                                    <strong class="price fw-500 color-dark">$3,280/<sub>m</sub></strong>
                                    <a href="../listing_details_03.php" class="btn-four rounded-circle"><i class="bi bi-arrow-up-right"></i></a>
                                </div>
                            </div>
                            <!-- /.property-info -->
                        </div>
                        <!-- /.listing-card-one -->
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex mb-50 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="listing-card-one border-25 h-100 w-100">
                            <div class="img-gallery p-15">
                                <div class="position-relative border-25 overflow-hidden">
                                    <div class="tag sale border-25">FOR SELL</div>
                                    <a href="#" class="fav-btn tran3s"><i class="fa-light fa-heart"></i></a>
                                    <div id="carousel5" class="carousel slide">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carousel5" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carousel5" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carousel5" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active" data-bs-interval="1000000">
                                                <a href="#" class="d-block"><img src="../images/listing/img_05.jpg" class="w-100" alt="..."></a>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="1000000">
                                                <a href="#" class="d-block"><img src="../images/listing/img_03.jpg" class="w-100" alt="..."></a>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="1000000">
                                                <a href="#" class="d-block"><img src="../images/listing/img_01.jpg" class="w-100" alt="..."></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.img-gallery -->
                            <div class="property-info p-25">
                                <a href="../listing_details_03.php" class="title tran3s">White House villa</a>
                                <div class="address">Muza link road, ca, usa</div>
                                <ul class="style-none feature d-flex flex-wrap align-items-center justify-content-between">
                                    <li class="d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_04.svg" alt="" class="lazy-img icon me-2">
                                        <span class="fs-16">1270 sqft</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_05.svg" alt="" class="lazy-img icon me-2">
                                        <span class="fs-16">02 bed</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_06.svg" alt="" class="lazy-img icon me-2">
                                        <span class="fs-16">02 bath</span>
                                    </li>
                                </ul>
                                <div class="pl-footer top-border d-flex align-items-center justify-content-between">
                                    <strong class="price fw-500 color-dark">$28,100.00</strong>
                                    <a href="../listing_details_03.php" class="btn-four rounded-circle"><i class="bi bi-arrow-up-right"></i></a>
                                </div>
                            </div>
                            <!-- /.property-info -->
                        </div>
                        <!-- /.listing-card-one -->
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex mb-50 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="listing-card-one border-25 h-100 w-100">
                            <div class="img-gallery p-15">
                                <div class="position-relative border-25 overflow-hidden">
                                    <div class="tag border-25">FOR RENT</div>
                                    <a href="#" class="fav-btn tran3s"><i class="fa-light fa-heart"></i></a>
                                    <div id="carousel6" class="carousel slide">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carousel6" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carousel6" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carousel6" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active" data-bs-interval="1000000">
                                                <a href="#" class="d-block"><img src="../images/listing/img_06.jpg" class="w-100" alt="..."></a>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="1000000">
                                                <a href="#" class="d-block"><img src="../images/listing/img_04.jpg" class="w-100" alt="..."></a>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="1000000">
                                                <a href="#" class="d-block"><img src="../images/listing/img_01.jpg" class="w-100" alt="..."></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.img-gallery -->
                            <div class="property-info p-25">
                                <a href="../listing_details_03.php" class="title tran3s">Luxury villa in Dal lake.</a>
                                <div class="address">Mirpur 10, Stadium</div>
                                <ul class="style-none feature d-flex flex-wrap align-items-center justify-content-between">
                                    <li class="d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_04.svg" alt="" class="lazy-img icon me-2">
                                        <span class="fs-16">1270 sqft</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_05.svg" alt="" class="lazy-img icon me-2">
                                        <span class="fs-16">02 bed</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_06.svg" alt="" class="lazy-img icon me-2">
                                        <span class="fs-16">02 bath</span>
                                    </li>
                                </ul>
                                <div class="pl-footer top-border d-flex align-items-center justify-content-between">
                                    <strong class="price fw-500 color-dark">$3,280/<sub>m</sub></strong>
                                    <a href="../listing_details_03.php" class="btn-four rounded-circle"><i class="bi bi-arrow-up-right"></i></a>
                                </div>
                            </div>
                            <!-- /.property-info -->
                        </div>
                        <!-- /.listing-card-one -->
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex mb-50 wow fadeInUp">
                        <div class="listing-card-one border-25 h-100 w-100">
                            <div class="img-gallery p-15">
                                <div class="position-relative border-25 overflow-hidden">
                                    <div class="tag border-25">FOR RENT</div>
                                    <a href="#" class="fav-btn tran3s"><i class="fa-light fa-heart"></i></a>
                                    <div id="carousel7" class="carousel slide">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carousel7" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carousel7" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carousel7" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active" data-bs-interval="1000000">
                                                <a href="#" class="d-block"><img src="../images/listing/img_27.jpg" class="w-100" alt="..."></a>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="1000000">
                                                <a href="#" class="d-block"><img src="../images/listing/img_04.jpg" class="w-100" alt="..."></a>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="1000000">
                                                <a href="#" class="d-block"><img src="../images/listing/img_01.jpg" class="w-100" alt="..."></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.img-gallery -->
                            <div class="property-info p-25">
                                <a href="../listing_details_03.php" class="title tran3s">Blueberry villa</a>
                                <div class="address">Mirpur 10, Stadium dhaka 1208</div>
                                <ul class="style-none feature d-flex flex-wrap align-items-center justify-content-between">
                                    <li class="d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_04.svg" alt="" class="lazy-img icon me-2">
                                        <span class="fs-16">1370 sqft</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_05.svg" alt="" class="lazy-img icon me-2">
                                        <span class="fs-16">03 bed</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_06.svg" alt="" class="lazy-img icon me-2">
                                        <span class="fs-16">02 bath</span>
                                    </li>
                                </ul>
                                <div class="pl-footer top-border d-flex align-items-center justify-content-between">
                                    <strong class="price fw-500 color-dark">$3,280/<sub>m</sub></strong>
                                    <a href="../listing_details_03.php" class="btn-four rounded-circle"><i class="bi bi-arrow-up-right"></i></a>
                                </div>
                            </div>
                            <!-- /.property-info -->
                        </div>
                        <!-- /.listing-card-one -->
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex mb-50 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="listing-card-one border-25 h-100 w-100">
                            <div class="img-gallery p-15">
                                <div class="position-relative border-25 overflow-hidden">
                                    <div class="tag sale border-25">FOR SELL</div>
                                    <a href="#" class="fav-btn tran3s"><i class="fa-light fa-heart"></i></a>
                                    <div id="carousel8" class="carousel slide">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carousel8" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carousel8" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carousel8" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active" data-bs-interval="1000000">
                                                <a href="#" class="d-block"><img src="../images/listing/img_26.jpg" class="w-100" alt="..."></a>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="1000000">
                                                <a href="#" class="d-block"><img src="../images/listing/img_03.jpg" class="w-100" alt="..."></a>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="1000000">
                                                <a href="#" class="d-block"><img src="../images/listing/img_01.jpg" class="w-100" alt="..."></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.img-gallery -->
                            <div class="property-info p-25">
                                <a href="../listing_details_03.php" class="title tran3s">White House villa</a>
                                <div class="address">Muza link road, ca, usa</div>
                                <ul class="style-none feature d-flex flex-wrap align-items-center justify-content-between">
                                    <li class="d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_04.svg" alt="" class="lazy-img icon me-2">
                                        <span class="fs-16">1270 sqft</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_05.svg" alt="" class="lazy-img icon me-2">
                                        <span class="fs-16">02 bed</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_06.svg" alt="" class="lazy-img icon me-2">
                                        <span class="fs-16">02 bath</span>
                                    </li>
                                </ul>
                                <div class="pl-footer top-border d-flex align-items-center justify-content-between">
                                    <strong class="price fw-500 color-dark">$21,000.00</strong>
                                    <a href="../listing_details_03.php" class="btn-four rounded-circle"><i class="bi bi-arrow-up-right"></i></a>
                                </div>
                            </div>
                            <!-- /.property-info -->
                        </div>
                        <!-- /.listing-card-one -->
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex mb-50 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="listing-card-one border-25 h-100 w-100">
                            <div class="img-gallery p-15">
                                <div class="position-relative border-25 overflow-hidden">
                                    <div class="tag border-25">FOR RENT</div>
                                    <a href="#" class="fav-btn tran3s"><i class="fa-light fa-heart"></i></a>
                                    <div id="carousel9" class="carousel slide">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carousel9" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carousel9" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carousel9" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active" data-bs-interval="1000000">
                                                <a href="#" class="d-block"><img src="../images/listing/img_30.jpg" class="w-100" alt="..."></a>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="1000000">
                                                <a href="#" class="d-block"><img src="../images/listing/img_06.jpg" class="w-100" alt="..."></a>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="1000000">
                                                <a href="#" class="d-block"><img src="../images/listing/img_01.jpg" class="w-100" alt="..."></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.img-gallery -->
                            <div class="property-info p-25">
                                <a href="../listing_details_03.php" class="title tran3s">Modern Apartments</a>
                                <div class="address">Mirpur 10, Stadium dhaka 1208</div>
                                <ul class="style-none feature d-flex flex-wrap align-items-center justify-content-between">
                                    <li class="d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_04.svg" alt="" class="lazy-img icon me-2">
                                        <span class="fs-16">1370 sqft</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_05.svg" alt="" class="lazy-img icon me-2">
                                        <span class="fs-16">03 bed</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_06.svg" alt="" class="lazy-img icon me-2">
                                        <span class="fs-16">02 bath</span>
                                    </li>
                                </ul>
                                <div class="pl-footer top-border d-flex align-items-center justify-content-between">
                                    <strong class="price fw-500 color-dark">$3,120/<sub>m</sub></strong>
                                    <a href="../listing_details_03.php" class="btn-four rounded-circle"><i class="bi bi-arrow-up-right"></i></a>
                                </div>
                            </div>
                            <!-- /.property-info -->
                        </div>
                        <!-- /.listing-card-one -->
                    </div>
                </div>
				<ul class="pagination-one d-flex align-items-center style-none pt-20">
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