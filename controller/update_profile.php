<?php
require_once '../include/session.php';
require_once '../include/config.php';

// Check if trainer is logged in
require_trainer_login();

// Get trainer token for API authentication
$token = get_trainer_token();
$trainer_id = get_trainer_id();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Basic profile information
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $designation = filter_input(INPUT_POST, 'designation', FILTER_SANITIZE_STRING);
    $mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_STRING);
    $short_about = filter_input(INPUT_POST, 'short_about', FILTER_SANITIZE_STRING);
    $about = filter_input(INPUT_POST, 'about', FILTER_SANITIZE_STRING);
    
    // Prepare data for API request
    $data = [
        'token' => $token,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'short_about' => $short_about,
        'about' => $about,
        'designation' => $designation,
        'mobile' => $mobile
    ];
    
    // Only include email if it's changed
    if ($email !== $_SESSION['trainer_email']) {
        $data['email'] = $email;
    }
    
    // API endpoint for updating trainer settings
    $api_url = API_BASE_URL . '/v1/trainer/settings/update';
    
    // Initialize cURL session for basic profile update
    $ch = curl_init($api_url);
    
    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
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
        // Update session variables
        $_SESSION['trainer_first_name'] = $first_name;
        $_SESSION['trainer_last_name'] = $last_name;
        $_SESSION['trainer_email'] = $email;
        $_SESSION['trainer_designation'] = $designation;
        $_SESSION['trainer_mobile'] = $mobile;
        $_SESSION['trainer_short_about'] = $short_about;
        $_SESSION['trainer_about'] = $about;
        $_SESSION['trainer_name'] = $first_name . ' ' . $last_name;
        
        // Handle profile image upload if provided
        if (isset($_FILES['profile_img']) && $_FILES['profile_img']['error'] === UPLOAD_ERR_OK) {
            $profile_img_result = uploadImage('profile_img', '/v1/trainer/profile-image/upload', $token);
            
            if ($profile_img_result['status']) {
                // $_SESSION['trainer_profile_img'] = $profile_img_result['url'];
            } else {
                $_SESSION['profile_error'] = $profile_img_result['message'];
            }
        }
        
        // Handle hero image upload if provided
        if (isset($_FILES['hero_img']) && $_FILES['hero_img']['error'] === UPLOAD_ERR_OK) {
            $hero_img_result = uploadImage('hero_img', '/v1/trainer/hero-image/upload', $token);
            
            if ($hero_img_result['status']) {
                // $_SESSION['trainer_hero_img'] = $hero_img_result['url'];
            } else {
                $_SESSION['hero_error'] = $hero_img_result['message'];
            }
        }
        
        $_SESSION['success_message'] = 'Profile updated successfully!';
    } else {
        // Update failed
        $error_message = isset($result['message']) ? $result['message'] : 'Failed to update profile. Please try again.';
        $_SESSION['error_message'] = $error_message;
    }
    
    // Redirect back to profile page
    header("Location: ../profile.php");
    exit;
}

/**
 * Helper function to upload an image
 * 
 * @param string $file_field The name of the file field
 * @param string $api_endpoint The API endpoint to upload to
 * @param string $token The authentication token
 * @return array Status and message/URL
 */
function uploadImage($file_field, $api_endpoint, $token) {
    $api_url = API_BASE_URL . $api_endpoint;
    
    // Check if file exists and is valid
    if (!isset($_FILES[$file_field]) || $_FILES[$file_field]['error'] !== UPLOAD_ERR_OK) {
        return [
            'status' => false,
            'message' => 'Invalid file upload'
        ];
    }
    
    // Initialize cURL session
    $ch = curl_init($api_url);
    
    // Create CURLFile
    $cfile = new CURLFile(
        $_FILES[$file_field]['tmp_name'],
        $_FILES[$file_field]['type'],
        $_FILES[$file_field]['name']
    );
    
    // Prepare data
    $data = [
        'token' => $token,
        $file_field => $cfile
    ];
    
    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
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
        return [
            'status' => true
        ];
    } else {
        return [
            'status' => false,
            'message' => isset($result['message']) ? $result['message'] : 'Failed to upload image'
        ];
    }
}
