<?php

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Force error display for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Session timeout settings (60 minutes)
$session_timeout = 3600; // 60 minutes in seconds

// Check if last activity time is set
if (isset($_SESSION['last_activity'])) {
    // Calculate time since last activity
    $inactive_time = time() - $_SESSION['last_activity'];
    
    // If inactive for too long, destroy session
    if ($inactive_time >= $session_timeout) {
        session_unset();
        session_destroy();
        
        // Redirect to login page with timeout message
        header("Location: login.php?timeout=1");
        exit;
    }
}

// Update last activity time
$_SESSION['last_activity'] = time();

/**
 * Check if trainer is logged in
 * @return bool True if logged in, false otherwise
 */
function is_trainer_logged_in() {
    return isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true;
}

/**
 * Require trainer login to access page
 * Redirects to login page if not logged in
 */
function require_trainer_login() {
    if (!is_trainer_logged_in()) {
        header("Location: login.php");
        exit;
    }
}

/**
 * Get trainer token for API requests
 * @return string|null Trainer token or null if not available
 */
function get_trainer_token() {
    return isset($_SESSION['trainer_token']) ? $_SESSION['trainer_token'] : null;
}

/**
 * Get trainer ID
 * @return int|null Trainer ID or null if not available
 */
function get_trainer_id() {
    return isset($_SESSION['trainer_id']) ? $_SESSION['trainer_id'] : null;
}

/**
 * Get trainer name
 * @return string|null Trainer name or null if not available
 */
function get_trainer_name() {
    return isset($_SESSION['trainer_name']) ? $_SESSION['trainer_name'] : null;
}

/**
 * Get trainer first name
 * @return string|null Trainer first name or null if not available
 */
function get_trainer_first_name() {
    return isset($_SESSION['trainer_first_name']) ? $_SESSION['trainer_first_name'] : null;
}

/**
 * Get trainer last name
 * @return string|null Trainer last name or null if not available
 */
function get_trainer_last_name() {
    return isset($_SESSION['trainer_last_name']) ? $_SESSION['trainer_last_name'] : null;
}