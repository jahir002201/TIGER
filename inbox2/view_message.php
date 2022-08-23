<?php
session_start();
require '../db.php';
require '../dashboard_header.php';


$select_msg = "SELECT * FROM messages ORDER BY id desc";
$message_result = mysqli_query($db_connect, $select_msg);
?>

<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header">
                <h3>All Messages</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($message_result as $ki => $messge) { ?>
                        <tr class="<?=($messge['status']==0?'bg-info':'')?>">
                            <td><?= $ki + 1 ?></td>
                            <td><?= $messge['name'] ?></td>
                            <td><?= $messge['email'] ?></td>
                            <td><?= $messge['message'] ?></td>
                            <td>
                                <a href="view.php?id=<?= $messge['id']?>" class="btn btn-success">view</a>
                                <a href="" class="btn btn-danger">Del</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>


<?php require '../dashboard_footer.php'; ?>