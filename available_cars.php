<?php
session_start();
require_once('inc/db.php');

$sql = "SELECT * FROM cars WHERE status = '1'";
$result = mysqli_query($conn, $sql);?>


<!DOCTYPE html>
<html>

<head>
  <title>CarVaan - Available Cars</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/lumen/bootstrap.min.css">
  <link rel="stylesheet" href="client/css/cars.css">
</head>

<body>

<?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'agency'): ?>
    <a href="admin/agency_dashboard.php" class="btn btn-primary">Back to home</a>
  <?php endif; ?>
  <?php if (!isset($_SESSION['role'])): ?>
    <a href="index.php" class="btn btn-primary">Back to home</a>
  <?php endif; ?>

  <div class="container">
    <h1>Available Cars</h1>

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
              <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'agency'): ?>
                <button class="btn btn-primary" disabled>Book Now</button>
              <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] == 'customer'): ?>
                <a href="booking.php?car_id=<?php echo $row['car_id']; ?>" class="btn btn-primary">Book Now</a>
              <?php else: ?>
                <a href="client/login_user.php?car_id=<?php echo $row['car_id']; ?>" class="btn btn-primary">Login to
                  Book</a>
              <?php endif; ?>
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

<?php require_once('inc/footer.php'); ?>