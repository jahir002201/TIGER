<?php 
session_start();
require '../db.php';

$id = $_GET['id'];

$delete = "DELETE FROM feedback WHERE id=$id";
$delete_result  = mysqli_query($db_connect, $delete);

$_SESSION['del'] = "feedback Content Deleted!";
header('location:add_feedback.php');

?>