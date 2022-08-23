<?php 
session_start();
require '../db.php';

$id = $_POST['id'];
$category = $_POST['category'];
$project_name = $_POST['project_name'];
$title = $_POST['title'];
$desp = mysqli_real_escape_string($db_connect, $_POST['desp']);
$uploaded_file = $_FILES['project_image'];


if($uploaded_file['name']==''){
	$update = "UPDATE works SET category='$category', project_name='$project_name', title='$title', desp='$desp' WHERE id=$id";
	$update_result = mysqli_query($db_connect, $update);

	$_SESSION['success'] = 'Works Content update Successfully!';
	header('location:add_work.php');
}
else{
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

        $update = "UPDATE works SET  added_by='$user_id', category='$category', project_name='$project_name', title='$title', desp='$desp', project_image='$file_name' WHERE id=$id";
        $update_result = mysqli_query($db_connect, $update);

        $_SESSION['success'] = 'Works Content update Successfully!';
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

}





?>
