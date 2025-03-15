<?php
require_once '../include/session.php';
require_once '../include/config.php';

// Check if trainer is logged in
require_trainer_login();

// Get trainer token for API authentication
$token = get_trainer_token();
$trainer_id = get_trainer_id();

// Handle AJAX requests
$data = json_decode(file_get_contents('php://input'), true);
$action = isset($data['action']) ? $data['action'] : '';

switch ($action) {
    case 'create':
        createAvailability($data);
        break;
    case 'get':
        getAvailabilities($data);
        break;
    default:
        sendResponse(false, 'Invalid action');
}

function createAvailability($data) {
    global $token, $trainer_id;
    
    if (empty($data['date'])) {
        sendResponse(false, 'Date is required');
        return;
    }
    
    // API endpoint for creating availability
    $api_url = API_BASE_URL . '/v1/availabilities';
    
    // Prepare data
    $requestData = [
        'token' => $token,
        'trainer_id' => $trainer_id,
        'date' => $data['date']
    ];
    
    // Initialize cURL session
    $ch = curl_init($api_url);
    
    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($requestData));
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
    
    if (($httpcode === 201 || $httpcode === 200) && isset($result['status']) && $result['status'] === true) {
        sendResponse(true, 'Availability created successfully', $result['data']);
    } else {
        $error_message = isset($result['message']) ? $result['message'] : 'Failed to create availability';
        sendResponse(false, $error_message);
    }
}

function getAvailabilities($data) {
    global $token, $trainer_id;
    
    // API endpoint for getting trainer availabilities
    $api_url = API_BASE_URL . "/v1/trainers/{$trainer_id}/availabilities";
    
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
        sendResponse(true, 'Availabilities retrieved successfully', $result['data']);
    } else {
        $error_message = isset($result['message']) ? $result['message'] : 'Failed to retrieve availabilities';
        sendResponse(false, $error_message);
    }
}

function sendResponse($status, $message, $data = []) {
    header('Content-Type: application/json');
    echo json_encode([
        'status' => $status,
        'message' => $message,
        'data' => $data
    ]);
    exit;
}
