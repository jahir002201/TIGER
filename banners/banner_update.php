<?php 
session_start();
require '../db.php';

$id = $_POST['id'];
$sub_title = $_POST['sub_title'];
$title = $_POST['title'];
$desp = $_POST['desp'];


$update = "UPDATE banners SET sub_title='$sub_title', title='$title', desp='$desp' WHERE id=$id";
$update_result = mysqli_query($db_connect, $update);

$_SESSION['update'] = 'Banner Updated!';
header('location:add_banner.php');


?>