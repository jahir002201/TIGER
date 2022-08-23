<?php 
session_start();
require '../db.php';

$id = $_GET['id'];

$delete = "DELETE FROM works WHERE id=$id";
$delete_result  = mysqli_query($db_connect, $delete);

$_SESSION['del'] = "Work Content Deleted!";
header('location:add_work.php');

?>