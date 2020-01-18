<?php

session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.html");
    exit;
}

require_once "config.php";
 
// Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$last_id = htmlspecialchars($_SESSION["id"]);

// Attempt insert query execution
$sql = "INSERT INTO foods (foodNAME, foodDESC, foodPRICE, userfoodID) VALUES ('$first_name', '$last_name', '$email', $last_id)";
if(mysqli_query($link, $sql)){
    header("location: food.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>