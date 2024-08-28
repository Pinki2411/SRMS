<!-- <a href="logout.php">Log Out</a> -->

<?php
require_once('dbcon.php');
// require_once('all_students.php');
session_start();

if (!isset($_SESSION['user_login'])) {
  header('Location:login.php');
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SMS-Dashboard</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- font awesone cdn: -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css">


  <!-- using these links for bootstrap datatables: -->
  <script type="text/javaScript" src="../js/jquery-3.5.1.js"></script>
  <script type="text/javaScript" src="../js/jquery.dataTables.min.js"></script>
  <script type="text/javaScript" src="../js/dataTables.bootstrap.min.js"></script>
  <script type="text/javaScript" src="../js/script.js"></script>

</head>

<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">

        <a class="navbar-brand" href="index.php"> <i  class="fa fa-home"></i> HOME</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


        <ul class="nav navbar-nav navbar-right">
          <li><a href=""><i class="fa fa-user"></i>Welcome</a></li>
          <li><a href="registation.php"><i class="fa fa-user-plus"></i>Add user</a></li>
          <li><a href="index.php?page=user_profile"><i class="fa fa-user"></i>Profile</a></li>
          <li><a href="logout.php"><i class="fa fa-power-off"></i>Logout</a></li>

        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3">
        <div class="list-group">
          <a href="index.php?page=dashboard" class="list-group-item active"><i class="fa fa-dashboard"></i>Dashboard</a>
          <a href="index.php?page=add_student" class="list-group-item"><i class="fa fa-user-plus"></i>Add Student</a>
          <a href="index.php?page=marks" class="list-group-item"><i class="fa fa-plus"></i>Add Marks</a>
          <a href="index.php?page=all_students" class="list-group-item"><i class="fa fa-users"></i>All Students</a>
          <a href="index.php?page=all_users" class="list-group-item"><i class="fa fa-users"></i>All Users</a>
          <!-- <a href="index.php?page=delete_student"></a> -->

        </div>

      </div>
      <div class="col-sm-9">
        <div class="content">

          <?php
          // $pages = $_GET['page'].'.php';
          // require_once($pages);
          if (isset($_GET['page'])) {
            $pages = $_GET['page'] . '.php';
          } else {
            $pages = "dashboard.php";
          }

          if (file_exists($pages)) {
            require_once($pages);
          } else {
            require_once('404.php');
          }

          ?>

        </div>
      </div>

    </div>
    <footer class="footer-area">
      <p>Copyright &COPY 2021. Student Management System. All Rights are Reserved.</p>
    </footer>
</body>

</html>
