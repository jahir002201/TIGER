<?php 
session_start();
require '../db.php';

$category = $_POST['category'];
$project_name = $_POST['project_name'];
$title = $_POST['title'];
$desp = mysqli_real_escape_string($db_connect, $_POST['desp']);



$uploaded_file = $_FILES['project_image'];
$after_explode = explode('.', $uploaded_file['name']);
$extension = end($after_explode);
$allowed_extension = array('jpeg', 'png', 'jpg');
$user_id = $_SESSION['id'];

if(in_array($extension, $allowed_extension)){
    if($uploaded_file['size'] <= 1000000){
        $name = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 5) . rand(100, 1000);
        $file_name = $name.'.'.$extension;
        $new_location = '../uploads/works/'.$file_name;
        move_uploaded_file($uploaded_file['tmp_name'], $new_location);

        $insert = "INSERT INTO works(added_by, category, project_name, title, desp, project_image)VALUES($user_id,'$category', '$project_name', '$title', '$desp', '$file_name')";
        $insert_result = mysqli_query($db_connect, $insert);

        $_SESSION['success'] = 'Works Content Added Successfully!';
        header('location:add_work.php');
    }
    else{
        $_SESSION['size'] = 'File size Too Large@ max 1MB';
        header('location:add_work.php');
    }
}
else{
    $_SESSION['extension'] = 'Invalid Extension!';
    header('location:add_work.php');
}




?>