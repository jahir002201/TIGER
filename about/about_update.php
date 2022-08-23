<?php
    session_start();
    require '../db.php';

    $id = $_POST['id'];
    $title = $_POST['title'];
    $descrp = $_POST['descrp'];

    $uploaded_file = $_FILES['image'];

    if($uploaded_file['name'] == ''){
        $update = "UPDATE abouts SET title = '$title', descrp = '$descrp' WHERE id=$id";
        $update_result = mysqli_query($db_connect, $update);
    
        $_SESSION['update'] = "About Section Updated Successfully!";
        header('location:edit_about.php');
    }
    else{
        $select = "SELECT * FROM abouts WHERE id = $id";
        $select_result = mysqli_query($db_connect, $select);
        $after_assoc = mysqli_fetch_assoc($select_result);
        $delete_from = '../uploads/abouts/'.$after_assoc['image'];
        unlink($delete_from);

        $after_explode = explode('.', $uploaded_file['name']);
        $extension = end($after_explode);
        $allowed_extension = array('jpg', 'jpeg', 'png', 'webp');
        if(in_array($extension, $allowed_extension)){
            if($uploaded_file['size'] <= 1000000 ){
                $file_name = 'about'.'.'.$extension;
                $new_location = '../uploads/abouts/'.$file_name;
                move_uploaded_file($uploaded_file['tmp_name'], $new_location);

                $update = "UPDATE abouts SET title = '$title', descrp = '$descrp', image = '$file_name' WHERE id=$id";
                $update_result = mysqli_query($db_connect, $update);
                $_SESSION['update'] = "About Section Updated Successfully!";
                header('location:edit_about.php');

            }
            else {
                $_SESSION['size'] = "File is too large, file must be less than 1 MB";
                header('location:edit_about.php');
            }
        }
        else {
            $_SESSION['extension'] = "File extension not allowed!1";
                header('location:edit_about.php');
        }
    }

    
?>