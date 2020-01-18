<?php

session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

require_once "config.php";
 
$uploaddir = 'php/images/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
$savePath = $_FILES['userfile']['name'];
// Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$last_id = htmlspecialchars($_SESSION["id"]);

$query = "UPDATE booth SET userid=('$last_id'), booth_desc=('$last_name'), booth_name=('$first_name'), booth_addr=('$email'), booth_pic=('$savePath') WHERE userid=('$last_id')";
//$result = mysqli_query('SELECT COUNT(*) FROM booth WHERE userid = ('$last_id')');
$test = "SELECT * FROM booth WHERE userid=('$last_id')";
$result = mysqli_query($link, $test);

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    if(mysqli_num_rows($result) > 0){
         mysqli_query($link, $query);
         header("location: gerai.php");
    }else{
            $sql = "INSERT INTO booth (booth_name, booth_desc, booth_addr, userid, booth_pic) VALUES ('$first_name', '$last_name', '$email', '$last_id', '$savePath')";
         if(mysqli_query($link, $sql)){
            header("location: gerai.php");
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                  }
        }   
}
// Close connection
mysqli_close($link);
?>

