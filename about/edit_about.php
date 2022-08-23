<?php

    session_start();
    require '../db.php';
    

    $select_about  = "SELECT * FROM abouts";
    $select_about_result = mysqli_query($db_connect, $select_about);
    $after_assoc = mysqli_fetch_assoc($select_about_result);

    require '../dashboard_header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Edit About Content</h3>
                </div>
                <div class="card-body">
                    <form action="about_update.php" method = "POST" enctype = "multipart/form-data">
                        <div class="mb-3">
                            <input type="hidden" name = "id" value = "<?=$after_assoc['id']?>" >
                            
                            <input type="text" class = "form-control" name = "title" value = "<?=$after_assoc['title']?>" placeholder = "Title">
                        </div>
                        
                        <div class="mb-3">
                            <textarea class = "form-control" name = "descrp" value = "" placeholder = "Description"><?=$after_assoc['descrp']?></textarea>
                        </div>

                        <div class="mb-3">
                            <input type="file" class = "form-control" name = "image"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <br>
                            <img src="/tiger/uploads/abouts/<?=$after_assoc['image']?>" alt="" id="blah" width = "100">
                        </div>

                        <div class="mb-3">
                            <button type = "submit" class = "btn btn-primary">Update About</button>
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

<?php if(isset($_SESSION['update'])){?>
    <script>
        Swal.fire({
        icon: 'success',
        title: '<?=$_SESSION['update']?>',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
<?php } unset($_SESSION['update'])?>

<?php if(isset($_SESSION['size'])){?>
    <script>
        Swal.fire({
        icon: 'error',
        title: '<?=$_SESSION['size']?>',
        })
    </script>
<?php } unset($_SESSION['size'])?>