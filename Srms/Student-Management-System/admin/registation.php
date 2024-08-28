<?php
require_once("dbcon.php");
session_start();

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $photo = $_FILES['photo']['name'];
    $photo_tmp = $_FILES['photo']['tmp_name'];
    $photo_ext = pathinfo($photo, PATHINFO_EXTENSION);
    $photo_name = $username . '.' . $photo_ext;
    $status = $_POST['status'];

    $input_error = array();

    // Validation
    if (empty($name)) $input_error['name'] = "The name field is required";
    if (empty($email)) $input_error['email'] = "The email field is required";
    if (empty($username)) $input_error['username'] = "The username field is required";
    if (empty($password)) $input_error['password'] = "The password field is required";
    if (empty($c_password)) $input_error['c_password'] = "The confirm password field is required";
    if (empty($photo)) $input_error['photo'] = "The photo field is required";

    if (count($input_error) == 0) {
        // Check email and username existence
        $email_check = $con->prepare("SELECT * FROM `users` WHERE email = ?");
        $email_check->bind_param("s", $email);
        $email_check->execute();
        $email_result = $email_check->get_result();

        $username_check = $con->prepare("SELECT * FROM `users` WHERE username = ?");
        $username_check->bind_param("s", $username);
        $username_check->execute();
        $username_result = $username_check->get_result();

        if ($email_result->num_rows == 0 && $username_result->num_rows == 0) {
            if (strlen($username) > 7 && strlen($password) > 7) {
                if ($password == $c_password) {
                    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

                    // Move uploaded photo
                    move_uploaded_file($photo_tmp, './users_images/' . $photo_name);

                    // Insert into database
                    $insert = $con->prepare("INSERT INTO `users` (`name`, `email`, `username`, `password`, `photo`, `status`) VALUES (?, ?, ?, ?, ?, ?)");
                    $insert->bind_param("ssssss", $name, $email, $username, $password_hashed, $photo_name, $status);

                    if ($insert->execute()) {
                        $_SESSION["data_insert_success"] = "Registration has been successfully done!";
                        header("Location: registration.php");
                        exit();
                    } else {
                        $_SESSION["data_insert_error"] = "Registration unsuccessful!";
                    }
                } else {
                    $password_auth = "Confirm password doesn't match";
                }
            } else {
                $password_l = "Password should be more than 7 characters";
            }
        } else {
            if ($email_result->num_rows > 0) $email_error = "The email already exists";
            if ($username_result->num_rows > 0) $username_error = "The username already exists";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="style.css" media="all">
</head>
<body>
    <div class="container">
        <h1 class="text-center" id="u">User Registration Form</h1>
        <br>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <th>Name:</th>
                    <td>
                        <input type="text" name="name" id="name" placeholder="Enter Your Name" class="form-control" value="<?php if (isset($name)) echo $name; ?>">
                        <label for="error" class="error"><?php if (isset($input_error['name'])) echo $input_error['name']; ?></label>
                    </td>
                    <th>Email:</th>
                    <td>
                        <input type="email" name="email" id="email" placeholder="Enter Your Email" class="form-control" value="<?php if (isset($email)) echo $email; ?>">
                        <label for="error" class="error"><?php if (isset($input_error['email'])) echo $input_error['email']; ?></label>
                        <label for="error" class="error"><?php if (isset($email_error)) echo $email_error; ?></label>
                    </td>
                </tr>
                <tr>
                    <th>Username:</th>
                    <td>
                        <input type="text" name="username" id="username" placeholder="Enter Your Username" class="form-control" value="<?php if (isset($username)) echo $username; ?>">
                        <label for="error" class="error"><?php if (isset($input_error['username'])) echo $input_error['username']; ?></label>
                        <label for="error" class="error"><?php if (isset($username_error)) echo $username_error; ?></label>
                        <label for="error" class="error"><?php if (isset($username_l)) echo $username_l; ?></label>
                    </td>
                    <th>Password:</th>
                    <td>
                        <input type="password" name="password" id="password" placeholder="Enter Your Password" class="form-control" value="<?php if (isset($password)) echo $password; ?>">
                        <label for="error" class="error"><?php if (isset($input_error['password'])) echo $input_error['password']; ?></label>
                        <label for="error" class="error"><?php if (isset($password_l)) echo $password_l; ?></label>
                    </td>
                </tr>
                <tr>
                    <th>Confirm Password:</th>
                    <td>
                        <input type="password" name="c_password" id="c_password" placeholder="Confirm Your Password" class="form-control" value="<?php if (isset($c_password)) echo $c_password; ?>">
                        <label for="error" class="error"><?php if (isset($input_error['c_password'])) echo $input_error['c_password']; ?></label>
                        <label for="error" class="error"><?php if (isset($password_auth)) echo $password_auth; ?></label>
                    </td>
                    <th>Photo:</th>
                    <td>
                        <input type="file" name="photo" id="photo">
                    </td>
                </tr>
                <tr>
                    <th>Status:</th>
                    <td>
                        <input type="radio" name="status" value="active" checked><span>Active</span> |
                        <input type="radio" name="status" value="inactive"><span>Inactive</span>
                    </td>
                    <td colspan="4">
                        <input type="submit" name="register" value="Register" class="btn btn-success btn-block">
                    </td>
                </tr>
            </table>
        </form>
        <p>If you have an account, please <a href="login.php">Login</a></p>
        <hr>
    </div>
    <div class="container">
        <footer>
            <p>Copyright @copy 2020-2022 <?php echo date('Y'); ?> All Rights Reserved</p>
        </footer>
    </div>
</body>
</html>
