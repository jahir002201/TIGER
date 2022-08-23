<?php

    session_start();
    require '../db.php';

    $icon = $_POST['icon'];
    $link = $_POST['link'];

    $insert = "INSERT INTO icons(icon, link) VALUES('$icon', '$link')";
    $insert_result = mysqli_query($db_connect, $insert);

    $_SESSION['success'] = 'Banner Icon Insert Successfully';

    header('location:add_social.php');
?>