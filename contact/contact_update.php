<?php
    session_start();
    require '../db.php';

    $id = $_POST['id'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];


    
$update = "UPDATE contact SET address='$address', phone_number = '$phone_number', email = '$email' WHERE id='$id'";
$update_resutl= mysqli_query($db_connect,$update);

$_SESSION['update'] = 'Contact Information Update Successfully';
header('location:edit_contact.php');
 

?>
