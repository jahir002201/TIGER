<?php 
session_start();
require '../db.php';
require '../dashboard_header.php';

$id = $_GET['id'];

$update = "UPDATE messages SET status=1 WHERE id=$id";
$update_result = mysqli_query($db_connect, $update);



$select = "SELECT * FROM messages WHERE id=$id";
$select_result = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_result);






?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Messege </h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">  
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                          </tr>
                          <tr>
                            <td>
                                <p><?=$after_assoc['name']?></p>
                            </td>
                            <td>
                                 <p><?=$after_assoc['email']?></p>
                            </td>
                          </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card text-center">
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th class="text-center">Message</th>
                        </tr>
                        <tr>
                            <td>
                            <p><?=$after_assoc['message']?></p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>













<?php require '../dashboard_footer.php'; ?>