<?php session_start();
require_once('inc/header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>CarVaan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/lumen/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .mySlides {
            display: none;
        }
    </style>

    <style>
        body {
            background-image: url("img/home.png");
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            background-size: cover;
        }

        .container {
            margin-left: 50px;
        }
    </style>

</head>

<body>

    <div class="container">
        <h1>Welcome to CarVaan</h1><br>
        <?php if (isset($_SESSION['email'])): ?>
               <h3><strong><?php echo $_SESSION['name']; ?></strong></h3>
               <?php endif; ?>
        <br>
        <h2 style="background-color: rgba(0, 0, 0, 0.5);color: #ffffff; padding: 10px; width:50%;">India's #1 Car Rental
            Provider! </h2>
        <h4 style="background-color: rgba(0, 0, 0, 0.5);color: #ffffff; padding: 10px;width:50%;">The perfect car for
            your next trip is just around the corner
            <br><br>
            Book your drive now!
        </h4>
        <a href="available_cars.php" class="btn btn-primary">Browse Available Cars</a>
        <br><br>
    </div>
    <div class="w3-container" style="text-align: center; background-color: rgba(0, 0, 0, 0.5);color: #ffffff; padding: 10px;;">
        <h2>A wide range of cars avilable </h2>
    </div>

    <div class="w3-content w3-section" style="max-width:500px">
        <img class="mySlides w3-animate-left" src="img/a.png" style="width:100%">
        <img class="mySlides w3-animate-right" src="img/c.png" style="width:100%">
        <img class="mySlides w3-animate-left" src="img/b.png" style="width:100%">
        <img class="mySlides w3-animate-right" src="img/d.png" style="width:100%">
        <img class="mySlides w3-animate-right" src="img/e.png" style="width:100%">

    </div>

    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) { myIndex = 1 }
            x[myIndex - 1].style.display = "block";
            setTimeout(carousel, 2500);
        }
    </script>


    <script src="https://unpkg.com/ioniconns@5.4.0/dist/ioniconns.js"></script>
</body>

</html>
<?php require_once("inc/footer.php"); ?>