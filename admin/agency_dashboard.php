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


?>

<!DOCTYPE html>
<html>

<?php
require_once('header.php');
require_once('../inc/db.php');



// Fetch all cars belonging to the current agency
$sql = "SELECT * FROM cars WHERE agency_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
?>

<head>

    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/lumen/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <h1>My Cars</h1>
        <div class="row">
            <?php while ($car = $result->fetch_assoc()): ?>
                <div class="col-sm-4">
                    <div class="card">
                        <img src="<?php echo $car['photo'] ?>" alt="<?php echo $car['model'] ?>">
                        <h5>
                            <?php echo $car['model'] ?>
                        </h5>
                        <p>Seating Capacity:
                            <?php echo $car['seating_capacity'] ?>
                        </p>
                        <p>Car Number:
                            <?php echo $car['car_number'] ?>
                        </p>

                        <div class="card">
                            <p>Rent Per Day:
                                <?php echo $car['rent_per_day'] ?>
                            </p>
                            <div class="rent-per-day-edit small">
                                <input type="number" class="form-control" value="<?php echo $car['rent_per_day'] ?>" min="1" step="any" >
                               
                            </div>
                        </div>



                        <div class="btn-group">
                        <button type="button" class="btn btn-primary save-rent-per-day-btn"
                                    data-car-id="<?php echo $car['car_id'] ?>">Save</button>
                            <button type="button"
                                class="btn btn-<?php echo $car['status'] == 1 ? 'success' : 'warning' ?> toggle-availability-btn"
                                data-car-id="<?php echo $car['car_id'] ?>"><?php echo $car['status'] == 1 ? 'Available' : 'Unavailable' ?></button>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <script src="js/rent.js"> </script>

    <script src="js/update_status.js"></script>

</body>

</html>
<?php require_once("../inc/footer.php"); ?>