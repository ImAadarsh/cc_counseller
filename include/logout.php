<?php
require_once 'session.php';
require_once 'config.php';

// Check if user is logged in
if (is_trainer_logged_in()) {
    $token = get_trainer_token();
    
    // Call logout API if token exists
    if ($token) {
        // API endpoint for trainer logout
        $api_url = API_BASE_URL . '/v1/trainer/logout';
        
        // Prepare data for API request
        $data = [
            'token' => $token
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
        curl_exec($ch);
        
        // Close cURL session
        curl_close($ch);
    }
}

// Destroy session regardless of API response
session_unset();
session_destroy();

// Redirect to login page
header("Location: ../login.php");
exit;
