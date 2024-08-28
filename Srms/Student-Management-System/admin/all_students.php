<?php
require_once('dbcon.php');
// require_once('index.php');
?>
<ol>
<h1 class="text-primary"><i class="fa fa-users"></i>All Students <small> All Students</small></h1>
    <ol class="breadcrumb">
  <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
</ol>
<div class="table-responsive" >
      <table class="table table-bordered table-hover table-striped"  style="text-align: center;" id="data">
        <thead>
          <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Roll</th>
            <th>Class</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Photo</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

      <?php
      $std_data = $con->query("SELECT * FROM `student_info`");
      // print_r($std_data);
      $sl = 0;
      while ($data = mysqli_fetch_assoc($std_data)){  ?>

          <tr>
            <td><?php echo ++$sl; ?></td>
            <td><?php echo $data['name']; ?></td>
            <td><?php echo $data['roll']; ?></td>
            <td><?php echo $data['class']; ?></td>
            <td><?php echo $data['city']; ?></td>
            <td><?php echo $data['pcontact']; ?></td>
            <td> <img src="./student_images/<?php echo $data['photo']; ?>" style="width: 100px;" alt=""> </td>
            <td>
              <a href="index.php?page=update_student&id=<?php echo base64_encode($data['id']); ?>" class="btn btn-xs btn-warning" title="Edit" ><i class="fa fa-pencil"></i>Edit</a>
              &nbsp;&nbsp;
              <a href="delete_student.php?id=<?php echo base64_encode($data['id']); ?>" class="btn btn-xs btn-danger" title="DElete" onclick="return confirm('Are you sure to delete?')" ><i class="fa fa-trash"></i>Delete</a>&nbsp;&nbsp;
              
              <!-- <a href="index.php?page=add_marks&id=<?php //echo base64_encode($data['id']); ?>" class="btn btn-xs btn-info" title="Add Marks">Add Marks</a>&nbsp;&nbsp; -->

              <a href="index.php?page=show_result&id=<?php echo base64_encode($data['id']); ?>" class="btn btn-xs btn-info" title="View Result">View Result</a>
              
            </td>
          </tr>

          <?php } ?>
        </tbody>
      </table>

      </div>