<?php
require_once '../include/session.php';
require_once '../include/config.php';

// Check if trainer is logged in
require_trainer_login();

// Get trainer token for API authentication
$token = get_trainer_token();
$trainer_id = get_trainer_id();

// Handle AJAX requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';
    
    switch ($action) {
        case 'add':
            addSpecialization();
            break;
        case 'delete':
            deleteSpecialization();
            break;
        case 'get':
            getSpecializations();
            break;
        default:
            sendResponse(false, 'Invalid action');
    }
}

/**
 * Add a new specialization
 */
function addSpecialization() {
    global $token, $trainer_id;
    
    $specialization = filter_input(INPUT_POST, 'specialization', FILTER_SANITIZE_STRING);
    
    if (empty($specialization)) {
        sendResponse(false, 'Specialization cannot be empty');
        return;
    }
    
    // API endpoint for adding specialization
    $api_url = API_BASE_URL . "/v1/trainers/{$trainer_id}/specializations";
    
    // Prepare data
    $data = [
        'token' => $token,
        'specialization' => $specialization
    ];
    
    // Initialize cURL session
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
    
    if ($httpcode === 201 && isset($result['status']) && $result['status'] === true) {
        sendResponse(true, 'Specialization added successfully', $result['data']);
    } else {
        $error_message = isset($result['message']) ? $result['message'] : 'Failed to add specialization';
        sendResponse(false, $error_message);
    }
}

/**
 * Delete a specialization
 */
function deleteSpecialization() {
    global $token, $trainer_id;
    
    $specialization_id = filter_input(INPUT_POST, 'specialization_id', FILTER_SANITIZE_NUMBER_INT);
    
    if (empty($specialization_id)) {
        sendResponse(false, 'Specialization ID is required');
        return;
    }
    
    // API endpoint for deleting specialization
    $api_url = API_BASE_URL . "/v1/trainers/{$trainer_id}/specializations/{$specialization_id}";
    
    // Prepare data
    $data = [
        'token' => $token
    ];
    
    // Initialize cURL session
    $ch = curl_init($api_url);
    
    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
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
        sendResponse(true, 'Specialization deleted successfully');
    } else {
        $error_message = isset($result['message']) ? $result['message'] : 'Failed to delete specialization';
        sendResponse(false, $error_message);
    }
}

/**
 * Get all specializations for the trainer
 */
function getSpecializations() {
    global $token, $trainer_id;
    
    // API endpoint for getting trainer details with specializations
    $api_url = API_BASE_URL . "/v1/trainers/{$trainer_id}";
    
    // Initialize cURL session
    $ch = curl_init($api_url);
    
    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
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
        $specializations = isset($result['data']['specializations']) ? $result['data']['specializations'] : [];
        sendResponse(true, 'Specializations retrieved successfully', $specializations);
    } else {
        $error_message = isset($result['message']) ? $result['message'] : 'Failed to retrieve specializations';
        sendResponse(false, $error_message);
    }
}

/**
 * Send JSON response
 * 
 * @param bool $status Success status
 * @param string $message Response message
 * @param array $data Optional data to return
 */
function sendResponse($status, $message, $data = []) {
    header('Content-Type: application/json');
    echo json_encode([
        'status' => $status,
        'message' => $message,
        'data' => $data
    ]);
    exit;
}
