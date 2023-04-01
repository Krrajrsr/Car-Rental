<?php session_start();
if (isset($_SESSION['role']) && ($_SESSION['role'] == 'agency')):
    echo '<script>alert("You are already logged in"); window.location.href = "agency_dashboard.php";</script>'; 
    exit();
endif;
if (isset($_SESSION['role']) && ($_SESSION['role'] == 'customer')):
    session_destroy();
    echo '<script>alert("You are already logged in as a customer! you will be logged out."); window.location.href = "login_agency.php";</script>'; 
    exit();
endif;
?>
<!DOCTYPE html>

<html>

<head>
    <title>Login Page - Agency</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/lumen/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <h1>Login Page</h1>
    <?php if (isset($error)) {
        echo $error;
    } ?>
    <form method="post" action="login_action.php">
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Password:</label>
        <input type="password" name="pass" required>
        <input type="submit" name="login" value="Login">
    </form>
    <div>
        Don't have an account yet? <a href="register_agency.php">Sign Up as an agency</a><br>
        or <a href="../client/login_user.php">Go to Customer Login</a>
    </div>
    <div>
     <a href="../index.php">Go to Home</a>

    </div>
</body>

</html>


<?php require_once('../inc/footer.php');?>
