<?php 
session_start();
require '../db.php';

$icon = $_POST['icon'];
$title = $_POST['title'];
$desp = $_POST['desp'];


$insert = "INSERT INTO services(icon, title, desp)VALUES('$icon', '$title', '$desp')";
$insert_result = mysqli_query($db_connect, $insert);

$_SESSION['success'] = 'Sercvice Content Added Successfully!';
header('location:add_service.php');

?>