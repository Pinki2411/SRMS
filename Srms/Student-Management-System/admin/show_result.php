<?php
require_once("dbcon.php");
$id = base64_decode($_GET['id']);
$std_name = $con->query("SELECT * FROM student_info WHERE id = $id");
$name = $std_name->fetch_assoc();
$result = $con->query("SELECT * FROM marks WHERE std_id = $id");

// Initialize variables
$total_marks = 0;
$subject_count = 0;
$is_pass = true;

while ($value = $result->fetch_assoc()) {
    if ($value['mark'] < 33) {
        $is_pass = false;
    }
    $total_marks += $value['mark'];
    $subject_count++;
}

// Calculate average and percentage
$average_marks = $subject_count > 0 ? $total_marks / $subject_count : 0;
$percentage = $subject_count > 0 ? ($total_marks / ($subject_count * 100)) * 100 : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
</head>
<body>
    <h1 class="text-primary"><?php echo $name['name']; ?>'s Result</h1>

    <div class="container">
        <div class="row" style="background-color: yellowgreen;">
            <div class="col-md-4">
                <h2>Name: <?php echo $name['name']; ?></h2>
            </div>
            <div class="col-md-4">
                <h2>Roll: <?php echo $name['roll']; ?></h2>
            </div>
            <div class="col-md-4">
                <h2>Class: <?php echo $name['class']; ?></h2>
            </div>
        </div>
    </div>
    <br>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Subject</th>
                <th>Marks</th>
                <th>Grade</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            // Fetch and display subject details
            $result->data_seek(0); // Reset the result pointer to fetch rows again
            while ($value = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $value['subject_name']; ?></td>
                <td><?php echo $value['mark']; ?></td>
                <td>
                    <?php
                    $grade = "";
                    if ($value['mark'] >= 90) {
                        $grade = "O"; // Outstanding
                    } elseif ($value['mark'] >= 80) {
                        $grade = "A+"; // Excellent
                    } elseif ($value['mark'] >= 70) {
                        $grade = "A"; // Very Good
                    } elseif ($value['mark'] >= 60) {
                        $grade = "B+"; // Good
                    } elseif ($value['mark'] >= 50) {
                        $grade = "B"; // Fair
                    } elseif ($value['mark'] >= 40) {
                        $grade = "C+"; // Satisfactory
                    } elseif ($value['mark'] >= 33) {
                        $grade = "C"; // Adequate
                    } elseif ($value['mark'] >= 25) {
                        $grade = "D+"; // Pass
                    } elseif ($value['mark'] >= 15) {
                        $grade = "D"; // Barely Pass
                    } elseif ($value['mark'] >= 5) {
                        $grade = "E"; // Fail
                    } else {
                        $grade = "F"; // Fail
                    }
                    echo $grade;
                    ?>
                </td>
                <td>
                    <?php
                    $message = "";
                    switch ($grade) {
                        case "O":
                            $message = "Outstanding";
                            break;
                        case "A+":
                            $message = "Excellent";
                            break;
                        case "A":
                            $message = "Very Good";
                            break;
                        case "B+":
                            $message = "Good";
                            break;
                        case "B":
                            $message = "Fair";
                            break;
                        case "C+":
                            $message = "Satisfactory";
                            break;
                        case "C":
                            $message = "Adequate";
                            break;
                        case "D+":
                            $message = "Pass";
                            break;
                        case "D":
                            $message = "Barely Pass";
                            break;
                        case "E":
                            $message = "Fail";
                            break;
                        case "F":
                            $message = "Fail";
                            break;
                    }
                    echo $message;
                    ?>
                </td>
            </tr>
            <?php } ?>
            
            <tr>
                <td><h2>Total Marks = </h2></td>
                <td><h2><?php echo $total_marks; ?></h2></td>
                <td>
                    <?php
                    $final_grade = "";
                    if (!$is_pass) {
                        $final_grade = "F";
                    } else {
                        if ($percentage >= 90) {
                            $final_grade = "O";
                        } elseif ($percentage >= 80) {
                            $final_grade = "A+";
                        } elseif ($percentage >= 70) {
                            $final_grade = "A";
                        } elseif ($percentage >= 60) {
                            $final_grade = "B+";
                        } elseif ($percentage >= 50) {
                            $final_grade = "B";
                        } elseif ($percentage >= 40) {
                            $final_grade = "C+";
                        } elseif ($percentage >= 33) {
                            $final_grade = "C";
                        } elseif ($percentage >= 25) {
                            $final_grade = "D+";
                        } elseif ($percentage >= 15) {
                            $final_grade = "D";
                        } elseif ($percentage >= 5) {
                            $final_grade = "E";
                        } else {
                            $final_grade = "F";
                        }
                    }
                    echo $final_grade;
                    ?>
                </td>
                <td>
                    <?php
                    $final_message = "";
                    switch ($final_grade) {
                        case "O":
                            $final_message = "Outstanding";
                            break;
                        case "A+":
                            $final_message = "Excellent";
                            break;
                        case "A":
                            $final_message = "Very Good";
                            break;
                        case "B+":
                            $final_message = "Good";
                            break;
                        case "B":
                            $final_message = "Fair";
                            break;
                        case "C+":
                            $final_message = "Satisfactory";
                            break;
                        case "C":
                            $final_message = "Adequate";
                            break;
                        case "D+":
                            $final_message = "Pass";
                            break;
                        case "D":
                            $final_message = "Barely Pass";
                            break;
                        case "E":
                            $final_message = "Fail";
                            break;
                        case "F":
                            $final_message = "Fail";
                            break;
                    }
                    echo $final_message;
                    ?>
                </td>
            </tr>
            <tr>
                <td><h2>Percentage = </h2></td>
                <td><h2><?php echo number_format($percentage, 2); ?>%</h2></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
