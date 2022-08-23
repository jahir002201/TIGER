<?php

    session_start();
    require '../db.php';

    $id = $_GET['id'];

    $select_status = "SELECT * FROM facts WHERE id=$id";
    $select_status_res = mysqli_query($db_connect, $select_status);
    $after_assoc = mysqli_fetch_assoc($select_status_res);

    if($after_assoc['status'] == 0){
        $update2 = "UPDATE facts SET status=1 WHERE id=$id";
        $update2_result = mysqli_query($db_connect, $update2);
    
        header('location:add_fact.php');
    }

    else{
        $update = "UPDATE facts SET status=0 WHERE id=$id";
        $update_result = mysqli_query($db_connect, $update);

        header('location:add_fact.php');
    }
?>