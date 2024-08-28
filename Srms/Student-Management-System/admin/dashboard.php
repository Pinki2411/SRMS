<?php
require_once('dbcon.php');
// require_once("index.php");
?>
<ol>
<h1 class="text-primary"><i class="fa fa-dashboard"></i>Dashboard <small> Statistics Overview </small></h1>
    <ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
</ol>

    <?php
    //calculate total students

    $count_student = $con->query("SELECT * FROM `student_info`");
      // print_r($count_student);
      $total_students = mysqli_num_rows($count_student);
      // print_r($total_students);

      //calculate total users

      $count_user = $con->query("SELECT * FROM `users`");
      $total_users = mysqli_num_rows($count_user);
    ?>

<div class="row">
    <div class="col-sm-4">
        <div class="panel panel-primary">
            <div class="panel-heading"  style="background-color:yellowgreen">
              <div class="row">
                  <div class="col-xs-3">
                      <i class="fa fa-users fa-5x"></i>
                  </div>
                  <div class="col-xs-9">
                      <div class="pull-right" style="font-size: 45px;"><?php echo $total_students; ?></div>
                      <div class="clearfix"></div>
                      <div class="pull-right">All Students</div>
                  </div>
              </div>
            </div>
          <a href="index.php?page=all_students">

          <div class="panel-footer">
             <span class="pull-left">All Students</span>
             <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
             <div class="clearfix"></div>
            </div>
          </a>
        </div>
    </div>


    <div class="col-sm-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="row">
                  <div class="col-xs-3">
                      <i class="fa fa-users fa-5x"></i>
                  </div>
                  <div class="col-xs-9">
                      <div class="pull-right" style="font-size: 45px; color:orange"><?php echo $total_users; ?></div>
                      <div class="clearfix"></div>
                      <div class="pull-right">All Users</div>
                  </div>
              </div>
            </div>
          <a href="index.php?page=all_users">

          <div class="panel-footer">
             <span class="pull-left">All Users</span>
             <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
             <div class="clearfix"></div>
            </div>
          </a>
        </div>
    </div>

    <!-- <div class="col-sm-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="row">
                  <div class="col-xs-3">
                      <i class="fa fa-users fa-5x"></i>
                  </div>
                  <div class="col-xs-9">
                      <div class="pull-right" style="font-size: 45px;">10</div>
                      <div class="clearfix"></div>
                      <div class="pull-right">All Students</div>
                  </div>
              </div>
            </div>
          <a href="">

          <div class="panel-footer">
             <span class="pull-left">All Students</span>
             <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
             <div class="clearfix"></div>
            </div>
          </a>
        </div>
    </div> -->
</div>
      <hr>
      <h3>New Students</h3>
      <div class="table-responsive" >
      <table class="table table-bordered table-hover table-striped" style="text-align: center;" id="data">
        <thead style="text-align: center;" >
          <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Roll</th>
            <th>Class</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Photo</th>
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
          </tr>

          <?php } ?>
        </tbody>
      </table>

      </div>
      

    </div>