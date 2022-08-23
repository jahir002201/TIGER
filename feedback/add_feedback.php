<?php
session_start();
require '../db.php';



$select = "SELECT * FROM feedback";
$select_feedback = mysqli_query($db_connect, $select);

require '../dashboard_header.php';
?>
<style>
    .abc span {
        display: none;
    }
</style>

<div class="container-fluid">
    <div class="row">
        
        <div class="col-lg-8 m-auto">
            <div class="card mb-4">
                <div class="card-header">
                    <h3>Add Feedback</h3>
                </div>
                <?php if (isset($_SESSION['extension'])) { ?>
                    <div class="alert alert-warning"><?= $_SESSION['extension'] ?></div>
                <?php }
                unset($_SESSION['extension']) ?>
                <div class="card-body">
                    <form action="feedback_post.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="project_name" class="form-control" placeholder="Project Name">
                        </div>
                        <div class="mb-3">
                            <textarea type="text" name="feedback" class="form-control" placeholder="Feedback"></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="file" name="user_image" class="form-control" placeholder="project_image">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add Content</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
		<div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Feedback List</h3>
                </div>
                <?php if (isset($_SESSION['update'])) { ?>
                    <div class="alert alert-success"><?= $_SESSION['update'] ?></div>
                <?php }
                unset($_SESSION['update']) ?>
                <div class="card-body">
                    <table id="table"class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th width="200">Title</th>
                            <th>Feedback</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($select_feedback as $key => $feedback) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $feedback['name'] ?></td>
                                <td><?= $feedback['title'] ?></td>
                                <td>
                                <?= substr($feedback['feedback'],0,20) ?>
                                <span style="cursor:pointer;" class="abc" value="<?= substr($feedback['feedback'] , 21) ?>"><i style="color:blue">Read More</i></span>
                                    
                                    
                                    
                                </td>
                                <td>
									<img width="50" src="../uploads/feedback/<?= $feedback['user_image'] ?>" alt="">
								</td>
                                <td>
									<a href="feedback_status.php?id=<?= $feedback['id'] ?>" class="btn btn-<?= ($feedback['status'] == 0 ? 'secondary' : 'success') ?>"><?= ($feedback['status'] == 0 ? 'deactive' : 'active') ?></a>
								</td>
                                <td>
                                    
                                    <button value="delete_feedback.php?id=<?= $feedback['id'] ?>" class="btn btn-danger del">Delete</button>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php if (mysqli_num_rows($select_feedback) == '0') { ?>
                            <tr>
                                <td class="text-center" colspan="5">
                                    <strong>No Data Found</strong>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require '../dashboard_footer.php';
?>
<script>
    $('.fa').click(function() {
        var icon = $(this).attr('class');
        $('#icon_input').attr('value', icon);

    });
</script>
<script>
    $('.abc').click(function() {
        var data = $(this).attr('value');
        $(this).html(data);
    });
</script>
<?php if (isset($_SESSION['success'])) { ?>
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '<?= $_SESSION['success'] ?>',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php }
unset($_SESSION['success']) ?>

<script>
    $('.del').click(function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var link = $(this).attr('value');
                window.location.href = link;
            }
        })
    })
</script>

<?php if (isset($_SESSION['del'])) { ?>
    <script>
        Swal.fire(
            'Deleted!',
            '<?= $_SESSION['del'] ?>',
            'success'
        )
    </script>
<?php }
unset($_SESSION['del']); ?>