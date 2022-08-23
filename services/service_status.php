<?php 
session_start();
require '../db.php';

$id = $_GET['id'];

$select = "SELECT * FROM services WHERE id=$id";
$select_result = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_result);

if($after_assoc['status'] == 1){
    $update = "UPDATE services SET status=0 WHERE id=$id";
    $update_result = mysqli_query($db_connect, $update);
    header('location:add_service.php');
}
else{
    $update2 = "UPDATE services SET status=1 WHERE id=$id";
    $update_result2 = mysqli_query($db_connect, $update2);
    header('location:add_service.php');
}



?>