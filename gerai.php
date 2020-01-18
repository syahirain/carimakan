<?php
// Initialize the session
session_start();
//require_once "config.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>Update Gerai</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/animate-3.7.0.css">
    <link rel="stylesheet" href="assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="assets/css/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Header Area Starts -->
	<header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo-area">
                        <a href="indexuser.php"><img src="assets/images/logo/logo1.png" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="custom-navbar">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>  
                    <div class="main-menu">
                        <ul>
                            <li class="active"><a href="indexuser.php">home</a></li>
                            <li><a href="restaurant.php">restaurant</a></li>
                            <li><a href="foodmenu.php">food</a></li>
                            <li><a href="searchmenu.php">search</a></li>
                            <li><a href="aboutus_acc.php">about us</a></li>
                            <li><a href="#"><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></a>
                                <ul class="sub-menu">
                                    <li><a href="account.php">My Account</a></li>
                                    <li><a href="mygerai.php">My Gerai</a></li>
                                    <li><a href="gerai.php">Update Gerai</a></li>
                                    <li><a href="food.php">Update Food</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->
    
    <section class="banner-area text-center">
     <head>
<meta charset="UTF-8">
<title>Add Gerai</title>
</head>
<body>
<form action="insertgerai.php" method="post" enctype='multipart/form-data'>
    <p>
        <label for="firstName">Gerai Name:</label>
        <input type="text" name="first_name" id="firstName">
    </p>
    <p>
        <label for="lastName">Description:</label>
        <input type="text" name="last_name" id="lastName">
    </p>
    <p>
        <label for="emailAddress">Address:</label>
        <input type="text" name="email" id="emailAddress">
    </p>
    <p>
         <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
    Gerai Picture: <input name="userfile" type="file" />
    </p>
    <input type="submit" value="Submit">
</form>
</body>
    </section>
    </body>
</html>
    