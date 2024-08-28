<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Student Result Management System</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <br>
    <div class="col-md-12 col-md-offset-10">
        <a href="./admin/login.php" class="btn btn-primary">Login</a>
    </div>

    <br>
    <br>
    <h1 class="text-center">Welcome to Student Result Management System</h1>
    <br>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <form action="" method="post">
                <table class="table table-bordered">
                    <tr>
                        <td colspan="2" class="text-center"><label style="color:lightgreen;" for="">Sudent Information</label></td>
                    </tr>
                    <tr>
                        <td><label for="Choose">Choose Class</label></td>
                        <td>
                            <select class="form-control" name="class" id="class">
                                <option value="">Select</option>
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
                        </td>
                    </tr>
                    <tr>
                        <td><label for="roll">Roll</label></td>
                        <td>
                            <input class="form-control" type="text" name="roll" id="roll" pattern="[0-9]{6}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"> <input class="btn btn-block btn-success" type="submit" name="show_info" value="Show"> </td>
                    </tr>
                </table>
            </form>

        </div>
    </div>

    <?php
    if (isset($_POST['show_info'])) {
        require_once('./admin/dbcon.php');
        $class = $_POST['class'];
        $roll = $_POST['roll'];
        $info = $con->query("SELECT * FROM `student_info` WHERE `class`='$class' AND `roll`='$roll'");
        if (mysqli_num_rows($info) == 1) {
            $final = mysqli_fetch_assoc($info);
            //    print_r($final);
    ?>

            <div class="row">
                <div class="col-sm-6 col-md-offset-3">
                    <table class="table table-bordered" style="text-align: center;">
                        <tr>
                            <td rowspan="5">
                                <img src="./admin/student_images/000121.png" class="img-thumbnail" style="width: 150px;" alt="Image not found">
                            </td>
                            <td>Name:</td>
                            <td><?php echo ucwords($final['name']) ; ?></td>
                        </tr>

                        <tr>
                            <td>Class:</td>
                            <td><?php echo $final['class']; ?></td>
                        </tr>

                        <tr>
                            <td>Roll:</td>
                            <td><?php echo $final['roll']; ?></td>
                        </tr>

                        <tr>
                            <td>City:</td>
                            <td><?php echo ucwords($final['city']); ?></td>
                        </tr>
                    </table>
                </div>

            </div>
        <?Php } else { ?>

            <script type="text/javascript">
                alert("Data not found");
            </script>

    <?php  }
    }   ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>