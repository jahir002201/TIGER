<?php

    session_start();
    require '../db.php';

    $icon = $_POST['icon'];
    $count = $_POST['count'];
    $title = $_POST['title'];

    $insert = "INSERT INTO facts (icon, count, title) VALUES('$icon', '$count', '$title')";
    $insert_result = mysqli_query($db_connect, $insert);

    $_SESSION['success'] = 'Fact Content Insert Successfully';

    header('location:add_fact.php');
?>