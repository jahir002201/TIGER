<?php

    session_start();
    require '../db.php';

    $id = $_GET['id'];

    $delete = "DELETE FROM facts WHERE id=$id";
    $delete_result = mysqli_query($db_connect, $delete);

    
     header('location:add_fact.php');
?>