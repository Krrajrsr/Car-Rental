<?php

session_start();
if (!isset($_SESSION['email'])) {
    echo '<script>alert("You are not logged in"); window.location.href = "login_agency.php";</script>';
    exit();
}
if (isset($_SESSION['role']) && ($_SESSION['role'] == 'customer')):
    session_destroy();
    echo '<script>alert("You are not authorized! Login first"); window.location.href = "login_agency.php";</script>'; 
    exit();
endif;

require_once('header.php');
require_once('../inc/db.php');

$sql = "SELECT b.start_date, b.num_days,b.booking_time, u.name, u.phone, u.address, c.model, c.car_number 
        FROM booked_cars b 
        JOIN users u ON b.user_id = u.user_id 
        JOIN cars c ON b.car_id = c.car_id 
        WHERE c.agency_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Bookings</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/lumen/bootstrap.min.css">
    <style>body {
    background-image: url('../img/picture.jpg');
    background-size: cover;
    background-position: center;
  }</style>
</head>
<body>
    <div class="container">
        <h1>Booked Cars</h1>      
        <table class="table">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Car Model</th>
                    <th>Car Number</th>
                    <th>Pickup Date</th>
                    <th>Number of Days</th>
                    <th>Booking Date/Time</th>

                </tr>
            </thead>
            <tbody>
                <?php while ($booking = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $booking['name'] ?></td>
                    <td><?php echo $booking['phone'] ?></td>
                    <td><?php echo $booking['address'] ?></td>
                    <td><?php echo $booking['model'] ?></td>
                    <td><?php echo $booking['car_number'] ?></td>
                    <td><?php echo $booking['start_date'] ?></td>
                    <td><?php echo $booking['num_days'] ?></td>
                    <td><?php echo $booking['booking_time'] ?></td>

                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php require_once("../inc/footer.php"); ?>
