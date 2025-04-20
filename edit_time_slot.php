<?php
include "include/session.php";
include "include/config.php";
include "include/connect.php";

// Require login to access this page
require_trainer_login();

// Get trainer ID and token from session
$trainer_id = get_trainer_id();
$trainer_token = get_trainer_token();

// Check if ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: timeslots.php");
    exit;
}

$slot_id = (int)$_GET['id'];

// Verify the time slot belongs to this trainer
$check_sql = "SELECT ts.*, ta.date, ta.trainer_id 
              FROM time_slots ts
              JOIN trainer_availabilities ta ON ts.trainer_availability_id = ta.id
              WHERE ts.id = $slot_id";
$check_result = $connect->query($check_sql);

if ($check_result->num_rows == 0 || $check_result->fetch_assoc()['trainer_id'] != $trainer_id) {
    // Time slot not found or doesn't belong to this trainer
    header("Location: timeslots.php");
    exit;
}

// Reset result pointer
$check_result->data_seek(0);
$time_slot = $check_result->fetch_assoc();

// Handle form submission
// Inside your edit_time_slot.php file, where you handle the form submission

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = $connect->real_escape_string($_POST['date']);
    $start_time = $connect->real_escape_string($_POST['start_time']);
    $end_time = $connect->real_escape_string($_POST['end_time']);
    $duration = (int)$_POST['duration'];
    $price = (float)$_POST['price'];
    $status = strtolower($connect->real_escape_string($_POST['status']));
    
    // Get the API base URL from config
    $api_url = API_BASE_URL . "/v1/time-slots/" . $slot_id;
    
    $curl = curl_init();
    $data = array(
        'token' => $trainer_token,
        'start_time' => $start_time,
        'end_time' => $end_time,
        'duration_minutes' => $duration,
        'price' => $price,
        'status' => $status
    );
    // print_r($data);
    curl_setopt_array($curl, array(
      CURLOPT_URL => $api_url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'PUT',
      CURLOPT_POSTFIELDS => json_encode($data),
      CURLOPT_HTTPHEADER => array(
        'Accept: application/json',
        'Content-Type: application/json',
        'Authorization: Bearer ' . $trainer_token
      ),
    ));
    
    $response = curl_exec($curl);
    // print_r($response);
    $response_data = json_decode($response, true);
    
    curl_close($curl);
    
    if (isset($response_data['status']) && $response_data['status'] === true) {
        // If date has changed, we need to update the availability in our database
        if ($date != $time_slot['date']) {
            // Check if there's already an availability for this date
            $avail_check_sql = "SELECT id FROM trainer_availabilities 
                               WHERE trainer_id = $trainer_id AND date = '$date'";
            $avail_result = $connect->query($avail_check_sql);
            
            if ($avail_result->num_rows > 0) {
                // Use existing availability
                $availability_id = $avail_result->fetch_assoc()['id'];
            } else {
                // Create new availability
                $insert_avail_sql = "INSERT INTO trainer_availabilities (trainer_id, date, created_at, updated_at)
                                   VALUES ($trainer_id, '$date', NOW(), NOW())";
                $connect->query($insert_avail_sql);
                $availability_id = $connect->insert_id;
            }
            
            // Update time slot with new availability ID
            $update_slot_sql = "UPDATE time_slots SET 
                              trainer_availability_id = $availability_id
                              WHERE id = $slot_id";
            $connect->query($update_slot_sql);
            
            // Check if old availability has any time slots left
            $check_old_avail_sql = "SELECT COUNT(*) as slot_count FROM time_slots 
                                  WHERE trainer_availability_id = " . $time_slot['trainer_availability_id'];
            $check_result = $connect->query($check_old_avail_sql);
            $check_row = $check_result->fetch_assoc();
            
            if ($check_row['slot_count'] == 0) {
                // Delete the availability entry too
                $delete_avail_sql = "DELETE FROM trainer_availabilities WHERE id = 
                                   " . $time_slot['trainer_availability_id'];
                $connect->query($delete_avail_sql);
            }
        }
        
        // Redirect to refresh the page
        header("Location: timeslots.php?updated=1");
        exit;
    } else {
        $error_message = "Error updating time slot. Please try again.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include "include/meta.php" ?>

<body>
    <div class="main-page-wrapper">
        <!-- Loading Transition -->
        <div id="preloader">
            <div id="ctn-preloader" class="ctn-preloader">
                <div class="icon"><img src="../images/loader.gif" alt="" class="m-auto d-block" width="250"></div>
            </div>
        </div>

        <!-- Dashboard Aside Menu -->
        <?php include "include/aside.php" ?>
        <!-- /.dash-aside-navbar -->

        <!-- Dashboard Body -->
        <div class="dashboard-body">
            <div class="position-relative">
                <!-- Header -->
                <?php include "include/header.php" ?>
                <!-- End Header -->

                <h2 class="main-title">Edit Time Slot</h2>
                
                <?php if (isset($error_message)): ?>
                <div class="alert alert-danger"><?php echo $error_message; ?></div>
                <?php endif; ?>
                
                <div class="bg-white card-box p-30 border-20">
                    <form method="post" class="mt-15">
                        <div class="row">
                            <div class="col-md-6 mb-20">
                                <label class="form-label">Date</label>
                                <input type="date" name="date" class="form-control" value="<?php echo $time_slot['date']; ?>" required>
                            </div>
                            
                            <div class="col-md-6 mb-20">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="available" <?php echo $time_slot['status'] == 'available' ? 'selected' : ''; ?>>Available</option>
                                    <option value="booked" <?php echo $time_slot['status'] == 'booked' ? 'selected' : ''; ?>>Booked</option>
                                    <option value="cancelled" <?php echo $time_slot['status'] == 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                                </select>
                            </div>
                            <input type="hidden" id="trainer_token" value="<?php echo get_trainer_token(); ?>">
                            <input type="hidden" id="trainer_id" value="<?php echo get_trainer_id(); ?>">

                            
                            <div class="col-md-6 mb-20">
                                <label class="form-label">Start Time</label>
                                <input type="time" name="start_time" class="form-control" value="<?php echo date('H:i', strtotime($time_slot['start_time'])); ?>" required>
                            </div>
                            
                            <div class="col-md-6 mb-20">
                                <label class="form-label">End Time</label>
                                <input type="time" name="end_time" class="form-control" value="<?php echo date('H:i', strtotime($time_slot['end_time'])); ?>" required>
                            </div>
                            
                            <div class="col-md-6 mb-20">
                                <label class="form-label">Duration (minutes)</label>
                                <input type="number" name="duration" class="form-control" value="<?php echo $time_slot['duration_minutes']; ?>" required>
                            </div>
                            
                            <div class="col-md-6 mb-20">
                                <label class="form-label">Price ($)</label>
                                <input type="number" step="0.01" name="price" class="form-control" value="<?php echo $time_slot['price']; ?>" required>
                            </div>
                        </div>
                        
                        <div class="mt-30">
                            <button type="submit" class="btn-one tran3s me-3">Update Time Slot</button>
                            <a href="timeslots.php" class="btn-two tran3s">Cancel</a>
                        </div>
                    </form>
                </div>
                <!-- /.card-box -->
            </div>
        </div>
        <!-- /.dashboard-body -->

        <button class="scroll-top">
            <i class="bi bi-arrow-up-short"></i>
        </button>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Bootstrap JS -->
        <script src="vendor/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/wow/wow.min.js"></script>
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
