<header class="dashboard-header">
					<div class="d-flex align-items-center justify-content-end">
						<h4 class="m0 d-none d-lg-block">Dashboard</h4>
						<button class="dash-mobile-nav-toggler d-block d-md-none me-auto">
							<span></span>
						</button>
						
						<div class="profile-notification position-relative dropdown-center ms-3 ms-md-5 me-4">
							<!-- <button class="noti-btn dropdown-toggle" type="button" id="notification-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
								<img src="images/lazy.svg" data-src="images/icon/icon_11.svg" alt="" class="lazy-img">
								<div class="badge-pill"></div>
							</button> -->
						</div>
						<div class="d-none d-md-block me-3">
							<a href="../index.php" class="btn-two"><span>Return Home</span> <i class="fa-thin fa-arrow-up-right"></i></a>
						</div>
						<div class="user-data position-relative">
							<button class="user-avatar online position-relative rounded-circle dropdown-toggle" type="button" id="profile-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
								<img src="<?php echo IMAGE_URL; echo isset($_SESSION['trainer_profile_img']) ? $_SESSION['trainer_profile_img'] : 'cc_s.png'; ?>" data-src="<?php echo IMAGE_URL; echo isset($_SESSION['trainer_profile_img']) ? $_SESSION['trainer_profile_img'] : 'cc_s.png'; ?>" alt="" class="lazy-img">
							</button>
							<!-- /.user-avatar -->
							<div class="user-name-data">
								<ul class="dropdown-menu" aria-labelledby="profile-dropdown">
									<li>
										<a class="dropdown-item d-flex align-items-center" href="profile.php"><img src="images/lazy.svg" data-src="images/icon/icon_23.svg" alt="" class="lazy-img"><span class="ms-2 ps-1">Profile</span></a>
									</li>
									<li>
										<a class="dropdown-item d-flex align-items-center" href="profile.php"><img src="images/lazy.svg" data-src="images/icon/icon_24.svg" alt="" class="lazy-img"><span class="ms-2 ps-1">Account Settings</span></a>
									</li>
									
								</ul>
							</div>
						</div>
						<!-- /.user-data -->
					</div>
				</header>