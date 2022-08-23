<?php 
session_start();
require '../db.php';

$id = $_GET['id'];

$delete = "DELETE FROM services WHERE id=$id";
$delete_result  = mysqli_query($db_connect, $delete);

$_SESSION['del'] = "Service Content Deleted!";
header('location:add_service.php');

?>