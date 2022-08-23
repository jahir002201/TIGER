<?php 
session_start();
require '../db.php';

$id = $_GET['id'];

$select = "SELECT * FROM works WHERE id=$id";
$select_result = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_result);

$select_count = "SELECT COUNT(*) as work_count FROM works WHERE status=1";
$select_count_result = mysqli_query($db_connect, $select_count);
$after_assoc_count = mysqli_fetch_assoc($select_count_result);


if($after_assoc['status']== 1 ){
    
        if($after_assoc_count['work_count']== 3) {
            $_SESSION['minimum'] = 'minimum 3 works should be active!';
            header('location:add_work.php');
        }
        else{
        
            $update = "UPDATE works SET status=0 WHERE id=$id";
            $update_result = mysqli_query($db_connect, $update);
            header('location:add_work.php');
        }
}
else{

    if($after_assoc_count['work_count'] ==6) {

            $_SESSION['maximum'] = 'maximum 6 works should be active!';
            header('location:add_work.php');
        }
        else{
    
            $update = "UPDATE works SET status=1 WHERE id=$id";
            $update_result = mysqli_query($db_connect, $update);
            header('location:add_work.php');
        }
}

    // if($after_assoc_count['work_count']== 3) {
    //     $_SESSION['minimum'] = 'minimum 3 works should be active!';
    //     header('location:add_work.php');
    // }
    // else{
    
    //     $update = "UPDATE works SET status=0 WHERE id=$id";
    //     $update_result = mysqli_query($db_connect, $update);
    //     header('location:add_work.php');
    // }
    // if($after_assoc_count['work_count'] ==6) {

    //         $_SESSION['maximum'] = 'maximum 6 works should be active!';
    //     header('location:add_work.php');

    // }
    // else{

    //           $update = "UPDATE works SET status=1 WHERE id=$id";
    //     $update_result = mysqli_query($db_connect, $update);
    //     header('location:add_work.php');
    // }


