 <?php
session_start();
require '../db.php';

$select = "SELECT * FROM works";
$select_work = mysqli_query($db_connect, $select);

require '../dashboard_header.php';
?>
<style>
    .abc span {
        display: none;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h3>Work List</h3>
                </div>
                <?php if (isset($_SESSION['update'])) { ?>
                    <div class="alert alert-success"><?= $_SESSION['update'] ?></div>
                <?php }
                unset($_SESSION['update']) ?>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Category</th>
                            <th width="100">Project Name</th>
                            <th >Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($select_work as $key => $work) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $work['category'] ?></td>
                                <td><?= $work['project_name'] ?></td>
                                <td style="width:10px"><?= $work['title'] ?></td>
                                <td>
                                <?= substr($work['desp'],0,20) ?>
                                <span style="cursor:pointer;" class="abc" value="<?= substr($work['desp'] , 21) ?>"><i style="color:blue">Read More</i></span>
                                    
                                    
                                    
                                </td>
                                <td><img width="50" src="../uploads/works/<?= $work['project_image'] ?>" alt=""></td>
                                <td><a href="work_status.php?id=<?=$work['id'] ?>" class="btn btn-<?= ($work['status'] == 0 ? 'secondary' : 'success') ?>"><?= ($work['status'] == 0 ? 'deactive' : 'active') ?></a></td>
                                <td>
                                    <a href="edit_work.php?id=<?=$work['id']?>" class="btn btn-info">Edit</a>
                                    <button value="delete_work.php?id=<?= $work['id'] ?>" class="btn btn-danger del">Delete</button>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php if (mysqli_num_rows($select_work) == '0') { ?>
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
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h3>Add Work Content</h3>
                </div>
                <?php if (isset($_SESSION['extension'])) { ?>
                    <div class="alert alert-warning"><?= $_SESSION['extension'] ?></div>
                <?php }
                unset($_SESSION['extension']) ?>
                <div class="card-body">
                    <form action="work_post.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="text" name="category" class="form-control" placeholder="Category Name">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="project_name" class="form-control" placeholder="Project Name">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="title" class="form-control" placeholder="Title">
                        </div>
                        <div class="mb-3">
                            <textarea type="text" name="desp" class="form-control" placeholder="Description"></textarea>
                        </div>
                        <div class="mb-3">
                        <input type="file" class = "form-control" name = "project_image"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <br>
                            <img  alt="" id="blah" width = "100">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add Content</button>
                        </div>
                    </form>
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


<!-- success alert -->
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
<!-- minimum alert -->
<?php if (isset($_SESSION['minimum'])) { ?>
    <script>
        Swal.fire({
            position: 'middle',
            icon: 'error',
            title: '<?= $_SESSION['minimum'] ?>',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php }
unset($_SESSION['minimum']) ?>
<!-- maximum alert -->
<?php if (isset($_SESSION['maximum'])) { ?>
    <script>
        Swal.fire({
            position: 'middle',
            icon: 'error',
            title: '<?= $_SESSION['maximum'] ?>',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php }
unset($_SESSION['maximum']) ?>






