<?php

    session_start();
    require '../db.php';

    $title = $_POST['title'];
    $percentage = $_POST['percentage'];
    $year = $_POST['year'];


    $insert_edu = "INSERT INTO educations(title, percentage, year)VALUES('$title', '$percentage', '$year')";
    $insert_edu_result = mysqli_query($db_connect, $insert_edu);

    $_SESSION['success'] = 'Educational Qualification Added Successfully';

    header('location:add_edu.php');


?>