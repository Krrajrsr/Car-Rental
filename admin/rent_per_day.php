<?php
session_start();

require_once('../inc/db.php');

$carId = $_POST['car_id'];
$rentPerDay = $_POST['rent_per_day'];

$sql = "UPDATE cars SET rent_per_day = ? WHERE car_id = ? AND agency_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("dii", $rentPerDay, $carId, $_SESSION['user_id']);
if ($stmt->execute()) {
    http_response_code(200);
} else {
    http_response_code(500);
    echo $stmt->error;
}
