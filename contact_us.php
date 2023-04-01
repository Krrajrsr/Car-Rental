<?php
session_start();
require_once('inc/db.php');
require_once('inc/header.php'); ?>



<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO contact_form_submissions (name, email, message) VALUES ('$name', '$email', '$message')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Thank you for contacting us!";
    } else {
        echo "There was an error submitting your form. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Contact Us</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
        }

        input,
        textarea {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            width: 100%;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0062cc;
        }
    </style>
</head>

<body>
    <center>
        <h1>Contact Us</h1>
    </center>
    <form method="post">
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label for="message">Message:</label>
            <textarea name="message" required></textarea>
        </div>
        <button type="submit">Submit</button>
    </form>
</body>

</html>
<?php require_once("inc/footer.php"); ?>