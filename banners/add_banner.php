<?php 
session_start();
require '../db.php';

$select = "SELECT * FROM banners";
$select_banner = mysqli_query($db_connect, $select);

require '../dashboard_header.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Banner Content List</h3>
                </div>
                <?php if(isset($_SESSION['update'])){ ?>
                    <div class="alert alert-success"><?=$_SESSION['update']?></div>
                 <?php } unset($_SESSION['update'])?>   
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Sub Title</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach($select_banner as $key=>$banner) { ?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><?=$banner['sub_title']?></td>
                            <td><?=$banner['title']?></td>
                            <td width="300"><?=$banner['desp']?></td>
                            <td><a href="banner_status.php?id=<?=$banner['id']?>" class="btn btn-<?= ($banner['status'] == 0?'secondary':'success') ?>"><?= ($banner['status'] == 0?'deactive':'active') ?></a></td>
                            <td>
                                <a href="edit_banner.php?id=<?=$banner['id']?>" class="btn btn-info del">Edit</a>
                                <button value="delete_banner.php?id=<?=$banner['id']?>" class="btn btn-danger del">Delete</button>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php if(mysqli_num_rows($select_banner) == '0'){ ?>
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
        <div class="col-lg-4 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Add Banner Content</h3>
                </div>

                <div class="card-body">
                    <form action="banner_post.php" method="POST">
                        <div class="mb-3">
                            <input type="text" name="sub_title" class="form-control" placeholder="Sub Title">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="title" class="form-control" placeholder="Title">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="desp" class="form-control" placeholder="Description">
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
<?php if(isset($_SESSION['success'])){ ?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '<?=$_SESSION['success']?>',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
<?php } unset($_SESSION['success'])?>

<script>
$('.del').click(function(){
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

<?php if(isset($_SESSION['del'])){ ?>
<script>
    Swal.fire(
        'Deleted!',
        '<?=$_SESSION['del']?>',
        'success'
        )
</script>
<?php } unset($_SESSION['del']);?> 

