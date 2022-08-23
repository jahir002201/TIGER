<?php

    session_start();
    require '../db.php';

    $id = $_GET['id'];

    $select_status = "SELECT * FROM icons WHERE id=$id";
    $select_status_res = mysqli_query($db_connect, $select_status);
    $after_assoc = mysqli_fetch_assoc($select_status_res);

    if($after_assoc['status'] == 0){
        $update2 = "UPDATE icons SET status=1 WHERE id=$id";
        $update2_result = mysqli_query($db_connect, $update2);
    
        header('location:add_social.php');
    }

    else{
        $update = "UPDATE icons SET status=0 WHERE id=$id";
        $update_result = mysqli_query($db_connect, $update);

        header('location:add_social.php');
    }
?>