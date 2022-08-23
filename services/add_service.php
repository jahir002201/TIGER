<?php 
session_start();
require '../db.php';

$select = "SELECT * FROM services";
$select_service = mysqli_query($db_connect, $select);

require '../dashboard_header.php';
?>
<style>
    .abc span{
        display:none;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Service List</h3>
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
                        <?php foreach($select_service as $key=>$service) { ?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><?=$service['icon']?></td>
                            <td><?=$service['title']?></td>
                            <td>
                                <?=substr($service['desp'], 0, 20)?>
                                <span style="cursor:pointer;" class="abc" value='<?=substr($service['desp'], 21)?>'><i style="color:blue">Read More</i></span>
                            </td>
                            <td><a href="service_status.php?id=<?=$service['id']?>" class="btn btn-<?= ($service['status'] == 0?'secondary':'success') ?>"><?= ($service['status'] == 0?'deactive':'active') ?></a></td>
                            <td>
                                <a href="edit_service.php?id=<?=$service['id']?>" class="btn btn-info del">Edit</a>
                                <button value="delete_service.php?id=<?=$service['id']?>" class="btn btn-danger del">Delete</button>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php if(mysqli_num_rows($select_service) == '0'){ ?>
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
                    <h3>Add Service Content</h3>
                </div>

                <div class="card-body">
                    <form action="service_post.php" method="POST">
                        <div>
                        <?php
                            $fonts = array (

                                'fa-yelp',
                                'fa-yen',
                                'fa-yoast',
                                'fa-youtube',
                                'fa-youtube-play',
                                'fa-youtube-square',
                                );
                        ?>

                        <?php foreach($fonts as $icon){ ?>
                            <i style="margin:5px; font-size:" class="fa <?= $icon;?>"></i>
                        <?php } ?>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="icon" id="icon_input" class="form-control" placeholder="icon">
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
<script>
    $('.fa').click(function (){
        var icon = $(this).attr('class');
        $('#icon_input').attr('value', icon);
        
    });
</script>
<script>
    $('.abc').click(function (){
        var data = $(this).attr('value');
        $(this).html(data);
    });
</script>
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

