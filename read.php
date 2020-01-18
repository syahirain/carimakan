<?php
// Initialize the session
session_start();
//require_once "config.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

require_once "config.php";

//$last_id = htmlspecialchars($_SESSION["id"]);
$last_id = $_GET['id'];
$sql = "SELECT * FROM foods WHERE foodID ='$last_id'";


if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $foodID = $row['foodID'];
            $foodDESCRIPTION = $row['foodDESC'];
            $foodNAME = $row['foodNAME'];
            $foodPRICE = $row['foodPRICE'];
            $foodPIC = $row['foodPIC'];
        }
        echo "</table>";
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
 

mysqli_close($link); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>Foodfun</title>

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
                        <a href="indexuser.php"><img src="assets/images/logo/logo.png" alt="logo"></a>
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
                            <li><a href="#"><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></a>
                                <ul class="sub-menu">
                                    <li><a href="account.php">My Account</a></li>
                                    <li><a href="mygerai.php">My Gerai</a></li>
                                    <li><a href="gerai.php">Add Gerai</a></li>
                                    <li><a href="food.php">Add Food</a></li>
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
    <div id="form-wrapper" style="max-width:500px;margin:auto;">
        <h2>Food Details</h2>
        <h4>Name: <b><?php echo $foodNAME; ?></b></h4> 
        <h4>ID: <b><?php echo $foodID; ?></b></h4>
        <h4>Description: <b><?php echo $foodDESCRIPTION; ?></b></h4>
        <h4>PRICE: <b><?php echo $foodPRICE; ?></b></h4>
        <img src='<?php echo "php/food_images/".$foodPIC;  ?>' >
    </div>
    <p><a href="food.php" class="btn btn-primary">Back</a></p>
     </section>
</body>
</html>
