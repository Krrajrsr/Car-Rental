<?php 
session_start();
if (isset($_SESSION['role']) && ($_SESSION['role'] == 'customer')):
    echo '<script>alert("You are already logged in"); window.location.href = "user_dashboard.php";</script>'; 
    exit();
endif;
if (isset($_SESSION['role']) && ($_SESSION['role'] == 'agency')):
    session_destroy();
    echo '<script>alert("You are already logged in as an agency! you will be logged out."); window.location.href = "login_user.php";</script>'; 
    exit();
endif;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
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
        <label>email:</label><br>
        <input type="email" name="email" required><br>
        <label>password:</label><br>
        <input type="password" name="pass" required><br>
        <input type="submit" name="login" value="login">
    </form>

    <div>
        Don't have a account yet? <a href="register_user.php">Sign Up </a><br>
        or <a href="../admin/login_agency.php">Go to Agency Login</a>

    </div>
    <div>
     <a href="../index.php">Go to Home</a>

    </div>
</body>

</html>

<?php require_once('../inc/footer.php');?>
