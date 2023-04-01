
<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/lumen/bootstrap.min.css">
	<link rel="stylesheet" href="css/register.css">

</head>
<body>
<?php
 if (isset($_GET['status'])) {
    $status = $_GET['status'];
    $message = $_GET['message'];
    if ($status == 'success') {
        echo '<div class="alert alert-success" role="alert">' . html_entity_decode($message) . '</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">' . html_entity_decode($message) . '</div>';
    }
}

    ?>

<div class="container">
	<div>
	<h2>Registration Form</h2>
	<form method="post" action="register_user_action.php">
		<label for="name">Name:</label><br>
		<input type="text" id="name" name="name" required><br>
		<label for="email">Email:</label><br>
		<input type="email" id="email" name="email" required><br>
		<label for="password">Password:</label><br>
		<input type="password" id="password" name="password" required><br>
		<label for="phone">Phone:</label><br>
		<input type="text" id="phone" name="phone" required><br>
		<label for="address">Address:</label><br>
		<input type="text" id="address" name="address" required><br><br>
		<input type="submit" value="Submit">
	</form>
	<div>
        or <a href="login_user.php">Back to Login</a>

    </div>
	<br><br>
	<div>
  <a href="../index.php" style="font-size: 24px; font-weight: bold;">Go to Home</a>
</div>
  </div>
</div>
</body>
</html>

<?php
