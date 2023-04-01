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


include '../inc/db.php'; 
require_once('header.php');

$user_id = $_SESSION['user_id'];
$sql = "SELECT booked_cars.booking_id,booked_cars.booking_time,cars.model, cars.car_number, cars.rent_per_day, booked_cars.start_date, booked_cars.num_days 
        FROM booked_cars 
        INNER JOIN cars ON booked_cars.car_id = cars.car_id 
        WHERE booked_cars.user_id = $user_id";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>My Bookings</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/lumen/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>body {
    background-image: url('../img/picture.jpg');
    background-size: cover;
    background-position: center;
  }</style>
</head>

<body>
    <h1>My Bookings</h1>
    <?php if (mysqli_num_rows($result) == 0): ?>
        <p>You have not made any bookings yet.</p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Model</th>
                    <th>Number</th>
                    <th>Rent Per Day</th>
                    <th>Start Date</th>
                    <th>Number of Days</th>
                    <th>Booking Date/Time</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['booking_id']; ?></td>
                        <td><?php echo $row['model']; ?></td>
                        <td><?php echo $row['car_number']; ?></td>
                        <td><?php echo $row['rent_per_day']; ?></td>
                        <td><?php echo $row['start_date']; ?></td>
                        <td><?php echo $row['num_days']; ?></td>
                        <td><?php echo $row['booking_time']; ?></td>

                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php endif; ?>
    <?php if (mysqli_num_rows($result) > 0): ?>
    <a href="user_dashboard.php" class="btn btn-primary">Back</a>
<?php endif; ?>

</body>

</html>
<?php require_once("../inc/footer.php"); ?>
