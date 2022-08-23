<?php 
session_start();
require '../db.php';

$name = $_POST['name'];
$project_name = $_POST['project_name'];
$feedback = $_POST['feedback'];





$uploaded_file = $_FILES['user_image'];
$after_explode = explode('.', $uploaded_file['name']);
$extension = end($after_explode);

$allowed_extension = array('jpg','png', 'gif', 'webp');
if(in_array($extension, $allowed_extension)){
if($uploaded_file['size'] <= 10000000){

	$insert = "INSERT INTO feedback(name, title, feedback)VALUES('$name', '$title', '$feedback')";
	$insert_result = mysqli_query($db_connect, $insert);

	$id = mysqli_insert_id($db_connect);
	$file_name = $id.'.'.$extension;
	$new_location = "../uploads/feedback/".$file_name;
	move_uploaded_file($uploaded_file['tmp_name'], $new_location);
	
	$update = "UPDATE feedback SET user_image='$file_name' WHERE id=$id";
	$update_result = mysqli_query($db_connect, $update);


	$_SESSION['success'] = 'feedback Content Added Successfully!';
	header('location:add_feedback.php');


}
	else{
		$_SESSION['size'] = 'File size Too Large @max 1MB';
		header('location:add_feedback.php');
	}
}
else{
$_SESSION['extension'] = 'Invalid Extension!';
header('location:add_feedback.php');
}




?>


