<?php
session_start(); 
require '../db.php';

$id = $_GET['id'];


$delete = "DELETE FROM users WHERE id=$id";
$delete_result = mysqli_query($db_connect, $delete);
$_SESSION['del'] = 'Deleted Successfully';
header('location:view_users.php');


?>