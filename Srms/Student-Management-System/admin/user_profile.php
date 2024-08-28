<?php 
require_once('dbcon.php');
$session_user =  $_SESSION['user_login'];

$user_data = $con->query("SELECT * FROM `users` WHERE `username` = '$session_user'");
// print_r($session_user);
$result = $user_data->fetch_assoc();
// echo "<pre>";
// print_r($result);
// exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
<ol>
<h1 class="text-primary"><i class="fa fa-user"></i>User Profile <small> My Profile</small></h1>
    <ol class="breadcrumb">
  <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
  <li><a href="#" class="active"><i class="fa fa-user"></i>Profile</a></li>
</ol>

<div class="row">
<div class="col-md-6 col-sm-offset-2">
<table class="table table-bordered text-center">
    <tr>
        <th>User ID:</th>
        <td><?php echo $result['id']; ?></td>
    </tr>
    <tr>
        <th>Name:</th>
        <td><?php echo $result['name']; ?></td>
    </tr>
    <tr>
        <th>Email:</th>
        <td><?php echo $result['email']; ?></td>
    </tr>
    <tr>
        <th>Username:</th>
        <td><?php echo $result['username']; ?></td>
    </tr>
    <tr>
        <th>Password:</th>
        <td><?php echo $result['password']; ?></td>
    </tr>
    <tr>
        <th>Status:</th>
        <td><?php if($result['status']=='active'){echo "Active";}else{ echo "Inactive";}?>
        </td>
    </tr>
    <tr>
        <th>Signup Date:</th>
        <td><?php echo $result['datetime']; ?></td>
    </tr>
    <tr>
        <td colspan=2>
            <a href="index.php?page=update_users&id=</?php echo base64_encode($result['id']); ?>" title="Edit Profile" class="btn
             btn-warning btn-block"> Edit</a>
        </td>
    </tr>
    <img class="img-thumbnail" width="450px;" src="../admin/users_images/<?php echo $result['photo']; ?>">
    <br>
    <br>
</table>
</div>



</div>
</body>
</html>
