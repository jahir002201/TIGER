<?php 
session_start();
require '../db.php';

$id = $_GET['id'];

$select_work = "SELECT * FROM works WHERE id = $id";
$select_work_result = mysqli_query($db_connect, $select_work);
$after_assoc = mysqli_fetch_assoc($select_work_result);


require '../dashboard_header.php';
?>

<div class="container">
    <div class="row">
    <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Add Work Content</h3>
                </div>
                <div class="card-body">
                    <form action="work_update.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                        <input type="hidden"name="id" value="<?=$after_assoc['id']?>" >
                            <input type="text" name="category" class="form-control" value="<?=$after_assoc['category']?>">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="project_name" class="form-control" value="<?=$after_assoc['project_name']?>">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="title" class="form-control" value="<?=$after_assoc['title']?>">
                        </div>
                        <div class="mb-3">
                            <textarea type="text" name="desp" class="form-control" ><?=$after_assoc['desp']?></textarea>
                        </div>
                        <div class="mb-3">
                        <input type="file" class = "form-control" name = "project_image"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <br>
                            <img src="/tiger/uploads/works/<?=$after_assoc['project_image']?>" alt="" id="blah" width = "100">
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
<?php if(isset($_SESSION['success'])){?> 
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

<?php if(isset($_SESSION['extension'])){?> 
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: '<?=$_SESSION['extension']?>',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
<?php } unset($_SESSION['extension'])?>

<?php if(isset($_SESSION['size'])){?> 
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: '<?=$_SESSION['size']?>',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
<?php } unset($_SESSION['size'])?>
