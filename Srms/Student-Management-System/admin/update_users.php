<?php
require_once('dbcon.php');
$id = base64_decode( $_GET['id']);
$session_user =  $_SESSION['user_login'];

$u = $con->query("SELECT * FROM `users`");
$u_up = $u->fetch_assoc();
// print_r($u_up);

if(isset($_POST['profile_update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $photo = explode('.', $_FILES['photo']['name']);
    // print_r($photo);
    $photo_extention = end($photo);
    // print_r($photo_extention);
    $photo_name = $session_user.'.'.$photo_extention;
    move_uploaded_file($_FILES['photo']['tmp_name'],'./users_images/'.$photo_name);
    // print_r($photo_name);
    $status = $_POST['status'];
    $datetime = $_POST['datetime'];
    if($_FILES['photo']['name']){
        $con->query("UPDATE `users` SET `name`='$name',`email`='$email',`username`='$username',`password`='$password',`photo`='$photo_name ',`status`='$status' WHERE `id` = $id");
    }else{
        $con->query("UPDATE `users` SET `name`='$name',`email`='$email',`username`='$username',`password`='$password',`status`='$status' WHERE `id` = $id;"); 
    } 

  
    header('Location:index.php?page=user_profile');
}
// print_r($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User Profile</title>
</head>
<body>

<ol>
<h1 class="text-primary"><i class="fa fa-user"></i>User Profile Update<small> This is  <?php echo $u_up['name'] ?>'s Profile</small></h1>
    <ol class="breadcrumb">
  <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
  <li><a href="index.php?page=user_profile" class="active"><i class="fa fa-user"></i>Profile</a></li>
</ol>

<form action="" method="post" enctype="multipart/form-data">

<div class="col-sm-4">
   <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="<?php echo $u_up['name']; ?>" required="">
   </div>
    </div>

    <div class="col-sm-4">
   <div class="form-group">
    <label for="email">Email</label>
    <input type="text" name="email" id="email" class="form-control" value="<?php echo $u_up['email']; ?>" required="">
   </div>
    </div>

    <div class="col-sm-4">
   <div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" class="form-control" value="<?php echo $u_up['username']; ?>" required="">
   </div>
    </div>

    <div class="col-sm-4">
   <div class="form-group">
    <label for="password">Password</label>
    <input type="text" name="password" id="password" class="form-control" value="<?php echo $u_up['password']; ?>" required="">
   </div>
    </div>

    <div class="col-sm-4">
   <div class="form-group">
    <label for="photo">Profile Picture</label>
    <input type="file" name="photo" id="photo" class="form-control" value="<?php echo $u_up['photo']; ?>">
   </div>
    </div>
  <div class="col-sm-4">
      <div class="form-group">
      <label for="status">Select Status:</label><br>
               <input type="radio" name="status" value="active" <?php if($u_up['status']=='active'){echo "checked";} ?> ><span>Active</span> |
               <input type="radio" name="status" value="inactive" <?php if($u_up['status']=='inactive'){echo "checked";} ?>><span>Inactive</span>
      </div>
  </div>
    
      <input type="submit" value="Update Profile" name="profile_update" class="btn btn-block btn-success">
    
</div>

</form> 
</body>
</html>
