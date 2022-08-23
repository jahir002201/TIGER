<?php 
session_start();
require '../db.php';

$id = $_GET['id'];

$delete = "DELETE FROM banners WHERE id=$id";
$delete_result  = mysqli_query($db_connect, $delete);

$_SESSION['del'] = "Banner Content Deleted!";
header('location:add_banner.php');

?>