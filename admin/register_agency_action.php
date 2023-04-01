<?php
require_once '../inc//db.php'; 

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$address = $_POST['address'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: register_agency.php?status=error&message=Invalid email format!');
    exit;
} else {
    $query = "SELECT * FROM agencies WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        header('Location: register_agency.php?status=error&message=Email already exists!');
        exit;
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO agencies (name, email, password, phone, address)
        VALUES ('$name', '$email', '$hashed_password', '$phone', '$address')";

        if (mysqli_query($conn, $sql)) {
            if (mysqli_query($conn, $sql)) {
                $message = 'Registration successful! Please <a href="login_agency.php"><span style="color: black;">login</span></a> to continue.';
                header('Location: register_agency.php?status=success&message=' . urlencode($message));
                exit;
            }
            else {
            header('Location: register_agency.php?status=error&message=Database error: ' . mysqli_error($conn));
            exit;
        }
    }
}
}
mysqli_close($conn);
?>
