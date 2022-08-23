<?php 
session_start();
require '../db.php';

$id = $_GET['id'];


$delete = "DELETE FROM messages WHERE id=$id";
$delete_result  = mysqli_query($db_connect, $delete);

$_SESSION['del'] = "Message Deleted!";
header('location:message_list.php');

?>