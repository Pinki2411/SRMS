<?php 
require_once('dbcon.php');
$id = base64_decode( $_GET['id']);
$con->query("DELETE FROM `student_info` WHERE `id` = '$id'");

header('Location:index.php?page=all_students');

?>
<!-- <script>
    window.location.assign//('all_students.php');
</script> -->