
<?php
require_once '../inc/db.php';

$email = $_POST['email'];
$password = $_POST['pass'];

$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row['password'])) {
        session_start();
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['name'] = $row['name'];
        header('Location: user_dashboard.php');
    }  else {
        echo '<script>alert("Please enter a valid password"); window.location.href = "login_user.php";</script>';
        exit;
    } 
} else {
    echo '<script>alert("email address not registered"); window.location.href = "login_user.php";</script>';
    exit;
}

mysqli_close($conn);
?>