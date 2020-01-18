<?php
// Initialize the session
session_start();
//require_once "config.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.html");
    exit;
}

require_once "config.php";

$last_id = htmlspecialchars($_SESSION["id"]);

$sql = "SELECT * FROM booth WHERE userid ='$last_id'";
//$sql1 = "SELECT * FROM foods WHERE userfoodID ='$last_id'";

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $boothID = $row['boothid'];
            $boothDESCRIPTION = $row['booth_desc'];
            $boothNAME = $row['booth_name'];
            $boothADDRESS = $row['booth_addr'];
            $boothPIC = $row['booth_pic'];
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
    <title>My Gerai</title>

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
    <div id="form-wrapper" style="max-width:500px;margin:auto;">
        <h2>Gerai Details</h2>
        <h4>Name: <b><?php echo $boothNAME; ?></b></h4> 
        <h4>ID: <b><?php echo $boothID; ?></b></h4>
        <h4>Description: <b><?php echo $boothDESCRIPTION; ?></b></h4>
        <h4>Address: <b><?php echo $boothADDRESS; ?></b></h4>
        <img src='<?php echo "php/images/".$boothPIC;  ?>' >
    </div>
    
     </section>
</body>
</html>
