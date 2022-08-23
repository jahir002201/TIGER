<?php 
session_start();
require '../db.php';
require '../dashboard_header.php';

$select = "SELECT * FROM messages ORDER BY id desc ";
$select_result = mysqli_query($db_connect, $select);







?>
<style>
.msg_colour{
 color:white;
background-color: #6b81a5d9;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Messege List </h3>
                </div>
                <div class="card-body">
                    <table class="table ">

                <?php if (isset($_SESSION['del'])) { ?>
                    <div class="alert alert-danger"><?= $_SESSION['del'] ?></div>
                <?php } unset($_SESSION['del']) ?>
                        <tr>
                            <th>SL</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>MESSAGE</th>
                            <th>ACTION</th>
                        </tr>
                        <?php foreach($select_result as $key => $message){ ?>
                        <tr class="<?=($message['status']==0?'msg_colour':'')?>">
                            <td><?= $key + 1 ?></td>
                            <td><?= $message['name']?></td>
                            <td><?= $message['email']?></td>
                            <td><?= $message['message']?></td>
                            <td>
                                <a href="view_message.php?id=<?=$message['id']?>" class="btn btn-primary">View</a>
                                <a href="delete_message.php?id=<?=$message['id']?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>















<?php require '../dashboard_footer.php'; ?>