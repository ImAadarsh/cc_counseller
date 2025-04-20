<?php
// API Configuration
define('API_BASE_URL', 'https://backend.campuscoach.in/public/api');
define('IMAGE_URL', 'https://backend.campuscoach.in/storage/app/');

// Site Configuration
define('SITE_NAME', 'Trainer Appointment Booking System');
define('SITE_URL', 'https://counsellor.campuscoach.in');

// Debug mode (set to false in production)
define('DEBUG_MODE', true);

// Error reporting based on debug mode
if (DEBUG_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}


// Function to get base URL
function get_base_url() {
    return SITE_URL;
}

// Function to get API URL
function get_api_url($endpoint = '') {
    return API_BASE_URL . $endpoint;
}
