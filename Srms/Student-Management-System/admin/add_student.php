<?php 
$con=new mysqli('localhost','root','','student_management'); 
if(isset($_POST['add_student_btn'])){
    // print_r($_POST);
    // print_r($_FILES);
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $class = $_POST['class'];
    $city = $_POST['city'];
    $pcontact = $_POST['pcontact'];
    $photo = explode('.', $_FILES['photo']['name']);
    // print_r($photo);
    $photo_extention = end($photo);
    // print_r($photo_extention);
    $photo_name = $roll.'.'.$photo_extention;
    move_uploaded_file($_FILES['photo']['tmp_name'],'./student_images/'.$photo_name);
    // print_r($photo_name);

    $student_insert = $con->query("INSERT INTO `student_info` (`id`, `name`, `roll`, `class`, `city`, `pcontact`, `photo`) VALUES (NULL, '$name', '$roll', '$class', '$city', '$pcontact', '$photo_name')");

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ol>
    <h1 class="text-primary"><i class="fa fa-user-plus"></i>Add Student <small>Add New Student </small></h1>
    <ol class="breadcrumb">
        <li><a href="index.php?pages=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
  <li class="active"><a href="#"><i class="fa fa-user-plus"></i>Add Student</a></li>
    </ol>

<div class="row">
    <?php
   if(isset($student_insert)){
      echo   $insert_success = "<b>Congratulations! Your data have been inserted successfully</b>";
    }else{
        $insert_fail = "<b>Sorry! data not inserted</b>";
    }
    ?>
</div>


<div class="row">
    <div class="col-sm-12">
    <form action="" method="post" enctype="multipart/form-data">
    <div class="col-sm-6">
    <div class="form-group">
    <label for="name">Student Name</label>
    <input type="text" name="name" id="name" placeholder="Student Name" class="form-control" required="">
     </div>
   </div>

   <div class="col-sm-6">
   <div class="form-group">
    <label for="roll">Student Roll</label>
    <input type="text" name="roll" id="roll" placeholder="Roll" pattern="[0-9]{6}" class="form-control" required="">
   </div>
    </div>
        
        <div class="col-sm-6">
        <div class="form-group">
            <label for="class">Class</label>
            <!-- <input type="text" name="class" id="class" placeholder="Class" class="form-control"> -->
            <select name="class" id="class" class="form-control" required="">
                <option value="">Select Class</option>
                <option value="One">One</option>
                <option value="Two">Two</option>
                <option value="Three">Three</option>
                <option value="Four">Four</option>
                <option value="Five">Five</option>
                <option value="Six">Six</option>
                <option value="Seven">Seven</option>
                <option value="Eight">Eight</option>
                <option value="Nine">Nine</option>
                <option value="Ten">Ten</option>
            </select>
        </div>
        </div>

        <div class="col-sm-6">
        <div class="form-group">
        <label for="city">City</label>
        <input type="text" name="city" id="city" placeholder="City" class="form-control" required="">
        </div>
        </div>
        
        <div class="col-sm-6">
        <div class="form-group">
        <label for="pcontact">Phone</label>
        <input type="text" name="pcontact" id="pcontact" placeholder="01*********"  class="form-control" required="">
        </div>
        </div>
        
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo" required="">
        </div>
        <div class="form-group">
            <input type="submit" name="add_student_btn" value="SUBMIT" class="btn btn-success btn-block">
        </div>
    </form>
    </div>

</div>
</body>
</html>