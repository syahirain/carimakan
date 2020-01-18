<?php

require_once "config.php";

$idgerai = $_GET['geraiid'];
echo $idgerai;
$sql = "SELECT * FROM booth WHERE boothid ='$idgerai' ";
//$sql1 = "SELECT * FROM foods WHERE userfoodID ='$last_id'";

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $boothID = $row['boothid'];
            $boothDESCRIPTION = $row['booth_desc'];
            $boothNAME = $row['booth_name'];
            $boothADDRESS = $row['booth_addr'];
            $boothPIC = $row['booth_pic'];
            $idtest = $row['userid'];
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
 
$sql1 = "SELECT * FROM foods WHERE userfoodID = '$idtest' ";
$i=0;
$my_array = [];

if($result1 = mysqli_query($link, $sql1)){
    if(mysqli_num_rows($result1) > 0){
        while($row = mysqli_fetch_assoc($result1)){
            
            $my_array[$i]['foodID'] = $row['foodID'];
            $my_array[$i]['foodDESC'] = $row['foodDESC'];
            $my_array[$i]['foodNAME'] = $row['foodNAME'];
            $my_array[$i]['foodPRICE'] = $row['foodPRICE'];
            $my_array[$i]['foodPIC'] = $row['foodPIC'];
            $i++;
        }
        echo "</table>";
        // Close result set
        mysqli_free_result($result1);
    } else{
        echo "No records matching your query were foundHUHU.";
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
    <title><?php echo $boothNAME; ?></title>

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
                        <a href="index.php"><img src="assets/images/logo/logo1.png" alt="logo"></a>
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
                            <li class="active"><a href="index.php">home</a></li>
                            <li><a href="indexrestaurant.php">restaurant</a></li>
                            <li><a href="indexfood.php">food</a></li>
                            <li><a href="indexsearch.php">search</a></li>
                            <li><a href="login.php">login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->
    
    

   <!-- Welcome Area Starts -->
    <section class="welcome-area section-padding2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <div class="welcome-img">
                        <img src='<?php echo "php/images/".$boothPIC;  ?>' class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-md-6 align-self-center">
                    <div class="welcome-text mt-5 mt-md-0">
                        <h3><span class="style-change"><?php echo $boothNAME; ?></span> </h3>
                          <p class="pt-3"><?php echo $boothDESCRIPTION; ?></p>
                            <p><?php echo $boothADDRESS; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Welcome Area End -->

    
     <!-- Deshes Area Starts -->
    <div class="deshes-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-top2 text-center">
                        <h3>Our <span>special</span> dishes</h3>
                    </div>
                </div>
            </div>
                                 
<?php
        $t=0;
        $a=1;
        while($t < $i){ 
                echo"<div class=row>";
        echo" <div class=col-lg-5 col-md-6 align-self-center> ";
               echo"  <h1>".$a."</h1>";
             echo      " <div class=deshes-text>";
                   echo"    <h3><span></span><br>".$my_array[$t]['foodNAME']."</h3>";
                   echo"     <p class=pt-3>".$my_array[$t]['foodDESC']."</p>";
                  echo"    <span class=style-change>".$my_array[$t]['foodPRICE']."</span>";
                    echo"</div>";
                echo"</div>";
                echo"<div class=col-lg-5 offset-lg-2 col-md-6 align-self-center mt-4 mt-md-0>";
                echo'  <img src='."php/food_images/".$my_array[$t]['foodPIC'].' alt="" class="img-fluid">';
                echo"</div>";
           echo"</div>";      
        $t++;
        $a++;
        }
   ?>          
            
        </div>
    </div>
    <!-- Deshes Area End -->

 <!-- Footer Area Starts -->
    <footer class="footer-area">
        <div class="footer-widget section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="single-widget single-widget1">
                            <a href="index.php"><img src="assets/images/logo/logo4.png" alt=""></a>
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