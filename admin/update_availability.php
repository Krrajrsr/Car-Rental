<?php
session_start();
require_once('../inc/db.php');

if(!isset($_SESSION['email'])){
    echo "you are logged out";
    header('../INDEX.php');
    exit();
}

if(isset($_POST['car_id']) && isset($_POST['availability'])) {
    $carId = $_POST['car_id'];
    $newAvailability = $_POST['availability'];

    // Update the car's availability in the database
    $sql = "UPDATE cars SET status = ? WHERE car_id = ? AND agency_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $newAvailability, $carId, $_SESSION['user_id']);
    $stmt->execute();

    // Send a response back to the JavaScript code
    echo "Car availability updated successfully";
}
