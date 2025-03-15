<?php
require_once '../include/session.php';
require_once '../include/config.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    
    if (empty($email) || empty($password)) {
        $_SESSION['login_error'] = 'Please enter both email and password';
        header("Location: ../login.php");
        exit;
    }
    
    // API endpoint for trainer login
    $api_url = API_BASE_URL . '/v1/trainer/login';
    
    // Prepare data for API request
    $data = [
        'email' => $email,
        'password' => $password
    ];
    
    // Initialize cURL session
    $ch = curl_init($api_url);
    
    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Accept: application/json'
    ]);
    
    // Execute cURL request
    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    // Close cURL session
    curl_close($ch);
    
    // Process response
    $result = json_decode($response, true);
    
    if ($httpcode === 200 && isset($result['status']) && $result['status'] === true) {
        // Login successful - store session data
        $_SESSION['trainer_id'] = $result['data']['trainer']['id'];
        $_SESSION['trainer_name'] = $result['data']['trainer']['first_name'] . ' ' . $result['data']['trainer']['last_name'];
        $_SESSION['trainer_email'] = $result['data']['trainer']['email'];
        $_SESSION['trainer_mobile'] = $result['data']['trainer']['mobile'];
        $_SESSION['trainer_token'] = $result['data']['token'];
        $_SESSION['trainer_first_name'] = $result['data']['trainer']['first_name'];
        $_SESSION['trainer_designation'] = $result['data']['trainer']['designation'];
        $_SESSION['trainer_last_name'] = $result['data']['trainer']['last_name'];
        $_SESSION['trainer_about'] = $result['data']['trainer']['about'];
        $_SESSION['trainer_short_about'] = $result['data']['trainer']['short_about'];
        $_SESSION['trainer_profile_img'] = $result['data']['trainer']['profile_img'];
        $_SESSION['trainer_hero_img'] = $result['data']['trainer']['hero_img'];
        $_SESSION['is_logged_in'] = true;
        
        // Redirect to dashboard
        header("Location: ../dashboard.php");
        exit;
    } else {
        // Login failed
        $error_message = isset($result['message']) ? $result['message'] : 'Invalid credentials. Please try again.';
        $_SESSION['login_error'] = $error_message;
        header("Location: ../login.php");
        exit;
    }
} else {
    // If not POST request, redirect to login page
    header("Location: ../login.php");
    exit;
}
