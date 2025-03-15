<?php
require_once '../include/session.php';
require_once '../include/config.php';

// Check if trainer is logged in
require_trainer_login();

// Get trainer token for API authentication
$token = get_trainer_token();

// Handle AJAX requests
$data = json_decode(file_get_contents('php://input'), true);
$action = isset($data['action']) ? $data['action'] : '';

switch ($action) {
    case 'create':
        createTimeSlot($data);
        break;
    case 'create_multiple':
        createMultipleTimeSlots($data);
        break;
    case 'get':
        getTimeSlots($data);
        break;
    default:
        sendResponse(false, 'Invalid action');
}

function createTimeSlot($data) {
    global $token;
    
    if (empty($data['trainer_availability_id']) || 
        empty($data['start_time']) || 
        empty($data['end_time']) || 
        empty($data['duration_minutes']) || 
        !isset($data['price'])) {
        sendResponse(false, 'Missing required fields');
        return;
    }
    
    // API endpoint for creating time slot
    $api_url = API_BASE_URL . '/v1/time-slots';
    
    // Prepare data
    $requestData = [
        'token' => $token,
        'trainer_availability_id' => $data['trainer_availability_id'],
        'start_time' => $data['start_time'],
        'end_time' => $data['end_time'],
        'duration_minutes' => $data['duration_minutes'],
        'price' => $data['price']
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
    
    if ($httpcode === 201 && isset($result['status']) && $result['status'] === true) {
        sendResponse(true, 'Time slot created successfully', $result['data']);
    } else {
        $error_message = isset($result['message']) ? $result['message'] : 'Failed to create time slot';
        sendResponse(false, $error_message);
    }
}

function createMultipleTimeSlots($data) {
    global $token;
    
    // Debug log
    error_log("Creating multiple time slots with data: " . json_encode($data));
    
    if (empty($data['trainer_availability_id']) || empty($data['slots']) || !is_array($data['slots'])) {
        error_log("Missing required fields in createMultipleTimeSlots");
        sendResponse(false, 'Missing required fields');
        return;
    }
    
    $results = [];
    $errors = [];
    
    foreach ($data['slots'] as $slot) {
        // Debug log
        error_log("Processing slot: " . json_encode($slot));
        
        // API endpoint for creating time slot
        $api_url = API_BASE_URL . '/v1/time-slots';
        
        // Prepare data
        $requestData = [
            'token' => $token,
            'trainer_availability_id' => $data['trainer_availability_id'],
            'start_time' => $slot['start_time'],
            'end_time' => $slot['end_time'],
            'duration_minutes' => $slot['duration_minutes'],
            'price' => $slot['price']
        ];
        
        // Debug log
        error_log("Sending request to API: " . json_encode($requestData));
        
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
        
        // Debug log
        error_log("API response code: " . $httpcode . ", response: " . $response);
        
        // Close cURL session
        curl_close($ch);
        
        // Process response
        $result = json_decode($response, true);
        
        if ($httpcode === 201 && isset($result['status']) && $result['status'] === true) {
            $results[] = $result['data'];
        } else {
            $error_message = isset($result['message']) ? $result['message'] : 'Failed to create time slot';
            $errors[] = [
                'slot' => $slot,
                'error' => $error_message,
                'response' => $result
            ];
        }
    }
    
    if (empty($errors)) {
        sendResponse(true, 'All time slots created successfully', $results);
    } else if (count($results) > 0) {
        sendResponse(true, 'Some time slots created successfully, but with errors', [
            'successful' => $results,
            'errors' => $errors
        ]);
    } else {
        sendResponse(false, 'Failed to create any time slots', ['errors' => $errors]);
    }
}




function getTimeSlots($data) {
    global $token;
    
    if (empty($data['availability_id'])) {
        sendResponse(false, 'Availability ID is required');
        return;
    }
    
    // API endpoint for getting time slots
    $api_url = API_BASE_URL . "/v1/availabilities/{$data['availability_id']}/time-slots";
    
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
        sendResponse(true, 'Time slots retrieved successfully', $result['data']);
        } else {
        $error_message = isset($result['message']) ? $result['message'] : 'Failed to retrieve time slots';
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


