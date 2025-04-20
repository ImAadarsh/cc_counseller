<?php
session_start();
// Redirect if already logged in
if(isset($_SESSION['trainer_id'])) {
    header("Location: index.php");
    exit;
}

// Check for login errors
$error = '';
if(isset($_SESSION['login_error'])) {
    $error = $_SESSION['login_error'];
    unset($_SESSION['login_error']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>

       /* Import Google Fonts */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

/* Base Styles */
body {
  font-family: 'Poppins', sans-serif;
  background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
  min-height: 100vh;
  display: flex;
  align-items: center;
  padding: 20px;
  margin: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
  margin: 0;
  padding: 0;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
}

/* Card Styling */
.card-box {
  border-radius: 10px;
  box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  overflow: hidden;
  position: relative;
}

.card-box:hover {
  transform: translateY(-5px);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.card-box::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 5px;
  background: linear-gradient(90deg, #2575fc, #6a11cb);
}

/* Form Elements */
.dash-input-wrapper {
  position: relative;
  margin-bottom: 25px;
}

.dash-input-wrapper label {
  display: block;
  font-weight: 500;
  margin-bottom: 8px;
  color: #333;
  transition: color 0.3s ease;
}

.dash-input-wrapper input {
  width: 100%;
  padding: 15px;
  border: 1px solid #e1e1e1;
  border-radius: 10px;
  font-size: 16px;
  transition: all 0.3s ease;
  background-color: #f9f9f9;
}

.dash-input-wrapper input:focus {
  border-color: #2575fc;
  box-shadow: 0 0 0 3px rgba(37, 117, 252, 0.1);
  outline: none;
  background-color: #fff;
}

.dash-input-wrapper input:focus + label {
  color: #2575fc;
}

/* Checkbox Styling */
.form-check-input {
  width: 18px;
  height: 18px;
  margin-top: 0.2em;
  cursor: pointer;
  border: 1px solid #ccc;
}

.form-check-input:checked {
  background-color: #2575fc;
  border-color: #2575fc;
}

.form-check-label {
  padding-left: 5px;
  cursor: pointer;
  font-size: 14px;
}

/* Button Styling */
.dash-btn-two {
  background: linear-gradient(90deg, #2575fc, #6a11cb);
  color: white;
  border: none;
  border-radius: 10px;
  padding: 15px 25px;
  font-weight: 600;
  font-size: 16px;
  cursor: pointer;
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
  z-index: 1;
}

.dash-btn-two:hover {
  transform: translateY(-2px);
  box-shadow: 0 7px 14px rgba(37, 117, 252, 0.2);
}

.dash-btn-two::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, #6a11cb, #2575fc);
  transition: all 0.4s ease;
  z-index: -1;
}

.dash-btn-two:hover::before {
  left: 0;
}

/* Alert Styling */
.alert-danger {
  background-color: #fff1f1;
  color: #e74c3c;
  border-left: 4px solid #e74c3c;
  border-radius: 0;
  padding: 15px;
  margin-bottom: 20px;
  animation: shake 0.5s ease-in-out;
}

@keyframes shake {
  0%, 100% { transform: translateX(0); }
  20%, 60% { transform: translateX(-5px); }
  40%, 80% { transform: translateX(5px); }
}

/* Links */
a {
  color: #2575fc;
  transition: color 0.3s ease;
  font-weight: 500;
}

a:hover {
  color: #6a11cb;
  text-decoration: none;
}

/* Logo Animation */
img {
  transition: transform 0.5s ease;
}

.card-box:hover img {
  transform: scale(1.05);
}

/* Responsive Adjustments */
@media (max-width: 768px) {
  .col-md-6 {
    width: 90%;
    margin: 0 auto;
  }
  
  .card-box {
    padding: 20px !important;
  }
  
  h2 {
    font-size: 24px;
  }
  
  .dash-input-wrapper input {
    padding: 12px;
  }
  
  .dash-btn-two {
    padding: 12px 20px;
  }
}

@media (max-width: 480px) {
  .d-flex {
    flex-direction: column;
    align-items: flex-start;
  }
  
  .d-flex a {
    margin-top: 10px;
  }
  
  .card-box {
    padding: 15px !important;
  }
}

/* Additional Cool Effects */
.text-muted {
  background: linear-gradient(90deg, #2575fc, #6a11cb);
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
  font-weight: 500;
}

/* Floating label effect */
.dash-input-wrapper input::placeholder {
  transition: opacity 0.3s ease;
}

.dash-input-wrapper input:focus::placeholder {
  opacity: 0;
}

/* Pulse effect on error */
@keyframes pulse {
  0% { box-shadow: 0 0 0 0 rgba(231, 76, 60, 0.4); }
  70% { box-shadow: 0 0 0 10px rgba(231, 76, 60, 0); }
  100% { box-shadow: 0 0 0 0 rgba(231, 76, 60, 0); }
}

.alert-danger {
  animation: pulse 1.5s infinite;
}

    </style>
<?php

    include "include/meta.php" ?> 
</head>


<body>
    <div class="main-page-wrapper">
        <!-- Loading Transition -->
        <div id="preloader">
            <div id="ctn-preloader" class="ctn-preloader">
                <div class="icon"><img src="../images/loader.gif" alt="" class="m-auto d-block" width="250"></div>
            </div>
        </div>

        <!-- Login Form Container -->
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-12">
                    <div class="bg-white card-box border-20 p-4">
                        <div class="text-center mb-4">
                            <img src="../assets/img/logo/logo.svg" alt="Logo" class="mb-3" style="max-width: 150px;">
                            <h2>Counseller Login</h2>
                            <p class="text-muted">Enter your credentials to access your account</p>
                        </div>
                        
                        <?php if(!empty($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                        <?php endif; ?>
                        
                        <form action="controller/process_login.php" method="POST">
                            <div class="dash-input-wrapper mb-3">
                                <label for="email">Email*</label>
                                <input type="email" id="email" name="email" placeholder="Your Email Address" required>
                            </div>
                            
                            <div class="dash-input-wrapper mb-3">
                                <label for="password">Password*</label>
                                <input type="password" id="password" name="password" placeholder="Your Password" required>
                            </div>
                            
                            <div class="d-flex justify-content-between mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">Remember me</label>
                                </div>
                                <a href="forgot_password.php" class="text-decoration-none">Forgot password?</a>
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" class="dash-btn-two tran3s w-100">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <button class="scroll-top">
            <i class="bi bi-arrow-up-short"></i>
        </button>
    </div>



		<!-- Optional JavaScript _____________________________  -->

		<!-- jQuery first, then Bootstrap JS -->
		<!-- jQuery -->
		<script src="vendor/jquery.min.js"></script>
		<!-- Bootstrap JS -->
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
	</div> <!-- /.main-page-wrapper -->
</body>

</html>