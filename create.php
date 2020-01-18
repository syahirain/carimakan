<?php

session_start();
 
// Check if the user is logged in, if not then redirect him to index page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$name = $address = $salary = $image = "";
$name_err = $address_err = $salary_err = $image_err = "";
$food_id = htmlspecialchars($_SESSION["id"]);
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["foodname"]);
    if(empty($input_name)){
        $name_err = "Please enter food name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate address
    $input_address = trim($_POST["description"]);
    if(empty($input_address)){
        $address_err = "Please enter food description.";     
    } else{
        $address = $input_address;
    }
    
    // Validate salary
    $input_salary = trim($_POST["price"]);
    if(empty($input_salary)){
        $salary_err = "Please enter the price.";     
    }  else{
        $salary = $input_salary;
    }
    
     // Validate pic
    $input_pic = trim($_POST["userfile"]);
    if(empty($input_pic)){
        $image_err = "Please insert an image.";     
    } else{
        $image = $input_pic;
    }
    
    
    $uploaddir = 'php/food_images/';
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
    $savePath = $_FILES['userfile']['name'];
    
  
    
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    
            $sql = "INSERT INTO foods (foodNAME, foodDESC, foodPRICE, foodPIC, userfoodID) VALUES ('$name', '$address', '$salary', '$savePath', '$food_id')";
         if(mysqli_query($link, $sql)){
            header("location: food.php");
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                  }
           
    } 
    
    // Close connection
    mysqli_close($link);
}
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Add Food</h2>
                    </div>
                    <p>Please fill this form and submit to add food to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype='multipart/form-data'>
                       <p>
                        <label for="firstName">Food Name:</label>
                        <input type="text" name="foodname" id="firstName">
                        </p>
                    <p>
                        <label for="lastName">Description:</label>
                        <textarea name="description" id="lastName"> </textarea>
                    </p>
                    <p>
                        <label for="emailAddress">Price:</label>
                        <input type="text" name="price" id="emailAddress">
                    </p>
                    <p>
                         <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
                    <label>Picture:</label> <input name="userfile" type="file" />
                    </p>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="food.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>