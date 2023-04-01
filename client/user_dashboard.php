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
require_once('header.php');
require_once('../inc/db.php');
?>


<!DOCTYPE html>
<html>

<head>
    <title> Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/lumen/bootstrap.min.css">
    <link rel="stylesheet" href="css/cars.css">

</head>

<body>
    <?php
    $sql = "SELECT * FROM cars WHERE status = '1'";
    $result = mysqli_query($conn, $sql);
    ?>
    <div class="centered-text">
        <h1>The perfect car for your next trip is just around the corner</h1>
        <h4>Book your drive now!</h4>
    </div>
    <br>
    <div class="container">
        <h2>Available Cars</h2>

        <?php $count = 0; ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <?php if ($count % 3 == 0): ?>
                <div class="row">
                <?php endif; ?>

                <div class="col-lg-4 col-md-6">
                    <div class="card my-4">
                        <img src="<?php echo $row['photo']; ?>" class="card-img-top" alt="<?php echo $row['model']; ?>">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $row['model']; ?>
                            </h5>
                            <p class="card-text">Seating Capacity:
                                <?php echo $row['seating_capacity']; ?>
                            </p>
                            <p class="card-text">Rent per day:
                                <?php echo $row['rent_per_day']; ?>
                            </p>
                            <a href="booking.php?car_id=<?php echo $row['car_id']; ?>" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>

                <?php $count++; ?>
                <?php if ($count % 3 == 0): ?>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>

        <?php if ($count % 3 != 0): ?>
        </div>
    <?php endif; ?>
    </div>
</body>

</html>

<?php require_once('../inc/footer.php'); ?>