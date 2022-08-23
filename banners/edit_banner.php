<?php 
session_start();
require '../db.php';
$id = $_GET['id'];

$select_banner = "SELECT * FROM banners WHERE id = $id";
$select_banner_result = mysqli_query($db_connect, $select_banner);
$after_assoc = mysqli_fetch_assoc($select_banner_result);


require '../dashboard_header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Banner Content</h3>
                </div>
                <div class="card-body">
                    <form action="banner_update.php" method="POST">
                        <div class="mb-3">
                            <input type="hidden" name="id" value="<?=$after_assoc['id']?>">
                            <input type="text" name="sub_title" class="form-control" value="<?=$after_assoc['sub_title']?>" placeholder="Sub Title">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="title" value="<?=$after_assoc['title']?>" class="form-control" placeholder="Title">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="desp" class="form-control" value="<?=$after_assoc['desp']?>" placeholder="Description">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update Content</button>
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