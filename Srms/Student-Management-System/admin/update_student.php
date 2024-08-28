<?php
require_once('dbcon.php');
$id = base64_decode( $_GET['id']);

$std_update_query = $con->query("SELECT * FROM`student_info` WHERE `id`='$id'");
$db_row = mysqli_fetch_assoc($std_update_query);


if(isset($_POST['update_student_btn'])){
    // print_r($_POST);
    // exit;
    // print_r($_FILES);
    // exit;
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
    if($_FILES['photo']['name']){
    $con->query("UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`pcontact`='$pcontact',`photo`='$photo_name' WHERE id = '$id'");
    }else{
        $con->query("UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`pcontact`='$pcontact' WHERE id = '$id'"); 
    } 
  header('Location:index.php?page=all_students');


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
    <h1 class="text-primary"><i class="fa fa-pencil"></i>Update <?php echo $db_row['name'];?>'s<small> Informations </small></h1>
    <ol class="breadcrumb">
        <li><a href="index.php?page=dashboard"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="index.php?page=all_students"> <i class="fa fa-users"></i> All Students</a></li>
  <!-- <li class="active"><a href="index.php?page=update_student"><i class="fa fa-pencil"></i>Update Student</a></li> -->
    </ol>

<div class="row">
  
</div>


<div class="row">
    <div class="col-sm-12">
    <form action="" method="post" enctype="multipart/form-data">
    <div class="col-sm-6">
    <div class="form-group">
    <label for="name">Student Name</label>
    <input type="text" name="name" id="name" placeholder="Student Name" class="form-control" value="<?php echo $db_row['name']; ?>" required="">
     </div>
   </div>

   <div class="col-sm-6">
   <div class="form-group">
    <label for="roll">Student Roll</label>
    <input type="text" name="roll" id="roll" placeholder="Roll" pattern="[0-9]{6}" class="form-control" value="<?php echo $db_row['roll']; ?>" required="">
   </div>
    </div>
        
        <div class="col-sm-6">
        <div class="form-group">
            <label for="class">Class</label>
            <!-- <input type="text" name="class" id="class" placeholder="Class" class="form-control"> -->
            <select name="class" id="class" class="form-control" required="">
                <option value="">Select Class</option>
                <option <?Php echo $db_row['class']=='One'? 'selected=""':""; ?> value="One">One</option>
                <option <?Php echo $db_row['class']=='Two'? 'selected=""':""; ?> value="Two">Two</option>
                <option <?Php echo $db_row['class']=='Three'? 'selected=""':""; ?> value="Three">Three</option>
                <option <?Php echo $db_row['class']=='Four'? 'selected=""':""; ?> value="Four">Four</option>
                <option <?Php echo $db_row['class']=='Five'? 'selected=""':""; ?> value="Five">Five</option>
                <option <?Php echo $db_row['class']=='Six'? 'selected=""':""; ?> value="Six">Six</option>
                <option <?Php echo $db_row['class']=='Seven'? 'selected=""':""; ?> value="Seven">Seven</option>
                <option <?Php echo $db_row['class']=='Eight'? 'selected=""':""; ?> value="Eight">Eight</option>
                <option <?Php echo $db_row['class']=='Nine'? 'selected=""':""; ?> value="Nine">Nine</option>
                <option <?Php echo $db_row['class']=='Ten'? 'selected=""':""; ?> value="Ten">Ten</option>
            </select>
        </div>
        </div>

        <div class="col-sm-6">
        <div class="form-group">
        <label for="city">City</label>
        <input type="text" name="city" id="city" placeholder="City" class="form-control"  value="<?php echo $db_row['city']; ?>" required="">
        </div>
        </div>
        
        <div class="col-sm-6">
        <div class="form-group">
        <label for="pcontact">Phone</label>
        <input type="text" name="pcontact" id="pcontact" placeholder="01*********" class="form-control"  value="<?php echo $db_row['pcontact']; ?>" required="">
        </div>
        </div>
        
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo"  value="<?php echo $db_row['photo']; ?>">
        </div>
        <div class="form-group">
            <input type="submit" name="update_student_btn" value="UPDATE" class="btn btn-success btn-block">
        </div>
    </form>
    </div>

</div>
</body>
</html>