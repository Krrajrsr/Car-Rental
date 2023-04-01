<?php
session_start();
require("../inc/db.php");

if (isset($_POST['save'])) {
  $model = $_POST['model'];
  $seating_capacity = $_POST['seating_capacity'];
  $rent = $_POST['rent_per_day'];
  $car_number=$_POST['car_number'];
  $agency_id = $_SESSION['user_id'];

  $photo_name = '';
  if ($_FILES['photo']['error'] == UPLOAD_ERR_OK) {
    $photo_name = $_FILES['photo']['name'];
    $photo_path = 'C:/xampp/htdocs/Car-Rental/img/' . $photo_name;
    move_uploaded_file($_FILES['photo']['tmp_name'], $photo_path);
    $photo_url = 'http://localhost/Car-Rental/img/' . $photo_name; // generate the URL of the photo
  }

  $sql = "INSERT INTO cars (model, car_number, seating_capacity, rent_per_day, photo, agency_id) VALUES ('$model', '$car_number', '$seating_capacity', '$rent', '$photo_url', '$agency_id')";
  mysqli_query($conn, $sql);
  mysqli_close($conn);

  header('Location: agency_dashboard.php');
  exit;
}
?>
