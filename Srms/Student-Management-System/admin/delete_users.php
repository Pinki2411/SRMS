<?php 
require_once('dbcon.php');
$id = base64_decode($_GET['id']);
$con->query("DELETE FROM `users` WHERE `id` = '$id'");
header('Location:index.php?page=all_users');
?>