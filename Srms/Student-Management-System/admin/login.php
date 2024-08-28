<?php 
session_start();
require_once('dbcon.php'); 


if(isset($_SESSION['user_login'])){
    header('Location:index.php');

} 


if(isset($_POST['login'])){
    // print_r($_POST);
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username_check = $con->query("SELECT * FROM `users` WHERE `username`='$username'");

    if(mysqli_num_rows($username_check)>0){
        
        $row = (mysqli_fetch_assoc($username_check));
        // print_r($row);
        if($row['password'] == ($password)){
           if($row['status'] =='active'){
               $_SESSION['user_login'] = $username;
               header('Location:index.php');
         }else{
            $status_inactive = "SORRY, Your status is now inactive as a user !";
           }
        }else{
            $worng_password = "Your password is incorrect";
        }

    }else{
       $username_not_found = "This usename is not found";
    }
}

// var_dump($_SESSION);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Result Management System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center" id="sl">Student Result Management System</h1>
        <br>
        
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <h2 class="text-center" id="l">Admin Login Form</h2>
                <form action="" method="post">
                    <div>
                        <input type="text" class="form-control" placeholder="User Name" name="username" required="" value="<?php if(isset($username)){ echo $username;} ?>">
                    </div>
                    <br>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" name="password" required="" value="<?php if(isset($password)){ echo $password; } ?>">
                    </div>
                    <br>
                    <div>
                        <input type="submit" name="login" value="Login" class="btn btn-success btn-block">
                    </div>
                </form>
               
            </div>
        </div>
        <br>
        <?php
        if(isset($username_not_found)){ echo '<div class="alert alert-danger col-sm-4 col-sm-offset-4">'.$username_not_found.'</div>'; }
        if(isset($worng_password)){ echo '<div class="alert alert-danger col-sm-4 col-sm-offset-4">'.$worng_password.'</div>'; } 
        
        ?>
       
    </div>
</body>
</html>