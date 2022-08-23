<?php

    session_start();
    require '../db.php';

    $id = $_GET['id'];
    $delete_edu = "DELETE FROM educations WHERE id=$id";
    $delete__edu_result = mysqli_query($db_connect, $delete_edu);

    $_SESSION['del'] = "Banner Content Deleted!";
    header('location:add_edu.php');

?>