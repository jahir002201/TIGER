<?php

    session_start();
    require '../db.php';
    

    $select_about  = "SELECT * FROM contact";
    $select_about_result = mysqli_query($db_connect, $select_about);
    $after_assoc = mysqli_fetch_assoc($select_about_result);

    require '../dashboard_header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Contact Information</h3>
                </div>
                <div class="card-body">
                    <form action="contact_update.php" method = "POST">
                        <div class="mb-3">
                            <input type="hidden" name = "id" value = "<?=$after_assoc['id']?>" >
                            <label for="" class=""> Address</label>
                            <input type="text" class = "form-control" name = "address" value = "<?=$after_assoc['address']?>" >
                        </div>
                        <div class="mb-3">
                            <label for=""> Phone Number</label>
                            <input type="text" class="form-control" name="phone_number" value="<?=$after_assoc['phone_number']?>">
                        </div>
                        <div class="mb-3">
                            <label for=""> Email</label>
                            <input type="text" class="form-control" name="email" value="<?=$after_assoc['email']?>">
                        </div>
                        


                        <div class="mb-3">
                            <button type = "submit" class = "btn btn-primary">Update Contact</button>
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

