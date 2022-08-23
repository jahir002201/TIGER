<?php 
session_start();
require 'db.php';

$errors = [];
$field_names = ['name'=>'Name Required', 'email'=>'Email Required', 'password'=>'Password Required', 'confirm_password'=>'confirm_password Required'];

foreach($field_names as $field_name=>$message){
    if(empty($_POST[$field_name])){
        $errors[$field_name] = $message;
    }
}
if(count($errors) == 0){
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $_SESSION['invalid'] ='invalid email address';
        header('location:register.php');
    }
    else if($_POST['password'] != $_POST['confirm_password']){
        $_SESSION['pass'] ='Password and Confirm password does not match';
        header('location:register.php');
    }

    else {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $after_hash = password_hash($password, PASSWORD_DEFAULT);

        $select_email = "SELECT COUNT(*) as email_exist FROM users WHERE email='$email'";
        $select_email_result = mysqli_query($db_connect, $select_email);
        $after_assoc = mysqli_fetch_assoc($select_email_result);
       
        if($after_assoc['email_exist'] == 1){
            $_SESSION['email_exist'] = "Email Already Exist!";
            header('location:register.php');
        }
        else{

            $uploaded_file = $_FILES['profile_photo'];
            $after_explode = explode('.', $uploaded_file['name']);
            $extension = end($after_explode);

            $allowed_extension = array('jpg','png', 'gif', 'webp');
            if(in_array($extension, $allowed_extension)){
            if($uploaded_file['size'] <= 10000000){
                $insert = "INSERT INTO users(name, email, password)VALUES('$name', '$email', '$after_hash')";
                mysqli_query($db_connect, $insert);
                $id = mysqli_insert_id($db_connect);
                $file_name = $id.'.'.$extension;
                $new_location = 'uploads/user/'.$file_name;
                move_uploaded_file($uploaded_file['tmp_name'], $new_location);
                
                $update = "UPDATE users SET profile_photo='$file_name' WHERE id=$id";
                $update_result = mysqli_query($db_connect, $update);

                $_SESSION['success'] = 'Registered Successfull!';
                header('location:register.php');
            }
            else{
                $_SESSION['size'] = 'File size too long!'; 
                header('location:register.php');
            }
            }
            else{
                $_SESSION['extension'] = 'Invalid Extension!';
                header('location:register.php');
            }
        }

    }
}
else{
    $_SESSION['errors'] = $errors;
    $_SESSION['name'] = $_POST['name'];
    header('location:register.php');
}


?>