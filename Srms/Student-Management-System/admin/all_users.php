<?php
require_once('dbcon.php');
// require_once('index.php');
?>
<ol>
  <h1 class="text-primary"><i class="fa fa-users"></i>All Users <small> All Users</small></h1>
  <ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li><a href="index.php?page=all_users"><i class="fa fa-users"></i>All Users</a></li>
  </ol>

  <div class="table-responsive">
    <table class="table table-bordered table-hover table-striped" style="text-align: center;" id="data">
      <thead>
        <tr>
          <th>SL</th>
          <th>Name</th>
          <th>Email</th>
          <th>Username</th>
          <th>Photo</th>
          <th>Status</th>
          <!-- <th>Action</th> -->
        </tr>
      </thead>
      <tbody>

        <?php
        $users_data = $con->query("SELECT * FROM `users`");
        // print_r($std_data);
        $sl = 0;
        while ($data = mysqli_fetch_assoc($users_data)) {  ?>

          <tr>
            <td><?php echo ++$sl; ?></td>
            <td><?php echo $data['name']; ?></td>
            <td><?php echo $data['email']; ?></td>
            <td><?php echo $data['username']; ?></td>
            <td> <img src="./users_images/<?php echo $data['photo']; ?>" style="width: 100px;" alt=""> </td>
            <td><?php echo $data['status']; ?></td>

            <!-- <td>
              <a href="index.php?page=update_users&id=</?php echo base64_encode($data/['id']); ?>" class="btn btn-xs btn-warning" title="Edit"><i class="fa fa-pencil"></i>Edit</a>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <a href="delete_users.php?id=</?php echo base64_encode($data/['id']); ?>" class="btn btn-xs btn-danger" title="DElete" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i>Delete</a>
            </td> -->
          </tr>

        <?php } ?>
      </tbody>
    </table>
  </div>