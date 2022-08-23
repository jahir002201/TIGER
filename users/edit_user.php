<?php 
session_start();
require '../db.php';
$id = $_GET['id'];

$select = "SELECT * FROM users WHERE id=$id";
$select_result = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_result);

?>
<?php 
require '../dashboard_header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card mt-5">
                <?php if(isset($_SESSION['success'])){ ?>
                    <div class="alert alert-success"><?=$_SESSION['success']?></div>
                <?php } unset($_SESSION['success'])?>
                <div class="card-header bg-primary">
                    <h3 class="text-white">User Edit</h3>
                </div>
                <div class="card-body">
                    <form action="update_user.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?=$after_assoc['id']?>">
                        <div class="mb-3">
                            <label for="" class="form-label">Full Name</label>
                            <input  type="text" id="name" name="name" value="<?=$after_assoc['name']?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email Address</label>
                            <input type="email" name="email" value="<?=$after_assoc['email']?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Profile Photo</label>
                            <input type="file" name="profile_photo" class="form-control">
                        </div>
                        <div class="mb-3">
                           <img width="100" src="/tiger/uploads/user/<?=$after_assoc['profile_photo']?>" alt="">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
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

