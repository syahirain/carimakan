<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to index page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

require_once "config.php";

$sql = "SELECT * FROM booth ";
$i=0;
$my_array = [];

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            
            $my_array[$i]['boothid'] = $row['boothid'];
            $my_array[$i]['booth_desc'] = $row['booth_desc'];
            $my_array[$i]['booth_name'] = $row['booth_name'];
            $my_array[$i]['booth_addr'] = $row['booth_addr'];
            $my_array[$i]['booth_pic'] = $row['booth_pic'];
            $i++;
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
 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>CariMakan</title>

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
    <!-- Preloader Starts -->
    <div class="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Preloader End -->

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

    <!-- Banner Area Starts -->
    <section class="banner-area text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6>discover food in malaysia</h6>
                    <h1>Don't use <span class="prime-color">Google</span><br>  
                    <span class="style-change">Use <span class="prime-color">CariMakan</span></span></h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

    <!-- Food Area starts -->
    <section class="food-area section-padding">
 	<div class="container">
	<div class="row">
 
 <?php
        
   $t=0;     
        while($t < $i){ 
           $useridsaja = $my_array[$t]['boothid'];
        echo "<div class=col-md-4 col-sm-6>";
            echo"<div class=single-food> ";
                echo"<div class=food-img>";
          // echo '<a href=menu.html> <img src= '."php/images/".$my_array[$t]['booth_pic'].' class=img-fluid alt="">';
        echo '<a href=gerai_detail_users.php?geraiid='.$useridsaja.'> <img src= '."php/images/".$my_array[$t]['booth_pic'].' class=img-fluid alt=""> </a>';
              
            echo "</div>";
            echo "<div class=food-content>";
            echo"<div class=d-flex justify-content-between>";
                echo"<h5>".$my_array[$t]['booth_name']."</h5>";
            echo"</div>";
                echo"<p class=pt-3>" .$my_array[$t]['booth_desc']."</p>";
            echo"</div>";
                echo"</div>";
                echo"</div>";
            $t++;
        }
    
    ?>
               
            </div>
        </div>
    </section>
    <!-- Food Area End -->

    <!-- Footer Area Starts -->
    <footer class="footer-area">
        <div class="footer-widget section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="single-widget single-widget1">
                            <a href="indexuser.php"><img src="assets/images/logo/logo4.png" alt=""></a>
                            <p class="mt-3">World class website</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-widget single-widget2 my-5 my-md-0">
                            <h5 class="mb-4">contact rain</h5>
                            <div class="d-flex">
                                <div class="into-icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="info-text">
                                    <p>Shah Alam, Malaysia </p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="into-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="info-text">
                                    <p>zero one four enter enter no get</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="into-icon">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div class="info-text">
                                    <p>syahirain96@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="social-icons">
                            <ul>
                                <li class="no-margin">Follow Us</li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->


    <!-- Javascript -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="assets/js/vendor/wow.min.js"></script>
    <script src="assets/js/vendor/owl-carousel.min.js"></script>
    <script src="assets/js/vendor/jquery.datetimepicker.full.min.js"></script>
    <script src="assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
