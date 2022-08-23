<?php

    session_start();
    require '../db.php';

    $id = $_POST['id'];
    $year = $_POST['year'];
    $title = $_POST['title'];
    $percentage = $_POST['percentage'];

    $update = "UPDATE educations SET year = '$year', title = '$title', percentage = '$percentage' WHERE id=$id";
    $update_result = mysqli_query($db_connect, $update);

    $_SESSION['update'] = "Educations Updated Successfully!";
    header('location:add_edu.php');
    
?>