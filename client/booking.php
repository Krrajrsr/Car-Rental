<?php
session_start();
if (!isset($_SESSION['email'])) {
    echo '<script>alert("You are not logged in"); window.location.href = "login_user.php";</script>';
    exit();
}
if (isset($_SESSION['role']) && ($_SESSION['role'] == 'agency')):
    session_destroy();
    echo '<script>alert("You are not authorized! Login first"); window.location.href = "login_user.php";</script>'; 
    exit();
endif;

require_once('../inc/db.php');
require_once('header.php');

$car_id = $_GET['car_id'];
$sql = "SELECT * FROM cars WHERE car_id = $car_id";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "Car not found.";
    exit();
}

$car = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $start_date = $_POST['start_date'];
    $num_days = $_POST['num_days'];

    if (empty($start_date) || empty($num_days)) {
        echo "Please fill in all fields.";
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $agency_id = $car['agency_id'];
    $sql = "INSERT INTO booked_cars (car_id, user_id, agency_id, start_date, num_days) 
            VALUES ($car_id, $user_id, $agency_id, '$start_date', $num_days)";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>alert("Booking successful."); window.location.href = "my_bookings.php";</script>';
    } else {
        echo "Error: " . mysqli_error($conn);
        exit();
    }
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Car - <?php echo $car['car_name']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/lumen/bootstrap.min.css">
    <style>body {
    background-image: url('../img/picture.jpg');
    background-size: cover;
    background-position: center;
  }</style>
</head>
<body>
    <div class="container mt-5">
        <h1>Book <?php echo $car['model']; ?></h1>
        <p><?php echo $car['car_number']; ?></p>
        <p>Price per day: ₹<?php echo $car['rent_per_day']; ?></p>
        <form method="POST">
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" class="form-control" id="start_date" name="start_date" required>
            </div>
            <div class="form-group">
                <label for="num_days">Number of Days:</label>
                <select class="form-control" id="num_days" name="num_days" required>
                    <option value="">-- Please select --</option>
                    <option value="1">1 day</option>
                    <option value="2">2 days</option>
                    <option value="4">4 days</option>
                    <option value="5">5 days</option>
                    <option value="6">6 days</option>
                    <option value="7">7 days</option>
                    <option value="8">8 days</option>
                    <option value="9">9 days</option>
                    <option value="10">10 days</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Book Now</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php require_once("../inc/footer.php"); ?>
