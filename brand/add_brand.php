<?php
session_start();
require '../db.php';



$select = "SELECT * FROM brands";
$select_brand = mysqli_query($db_connect, $select);

require '../dashboard_header.php';
?>
<style>
    .abc span {
        display: none;
    }
</style>

<div class="container-fluid">
    <div class="row">
        
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h3>Add Brand Photo</h3>
                </div>
                <?php if (isset($_SESSION['extension'])) { ?>
                    <div class="alert alert-warning"><?= $_SESSION['extension'] ?></div>
                <?php }
                unset($_SESSION['extension']) ?>
                <div class="card-body">
                    <form action="brand_post.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                    <label for="">Brand Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Brand Name">
                    </div>

                    <div class="mb-3">
                            <label for="">Brand Image</label>
                            <input type="file" class = "form-control" name = "image"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <br>
                            <img src="" alt="" id="blah" width = "100">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add Brand</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
		<div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Brand List</h3>
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
                            <th>Image</th>                     
                            <th>Action</th>
                        </tr>
                        <?php foreach ($select_brand as $key => $brand) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $brand['name'] ?></td>
                                <td>
									<img width="50" src="../uploads/brand_picture/<?= $brand['image'] ?>" alt="">
								</td>
                                <td>
                                    
                                    <button value="delete_brand.php?id=<?= $brand['id'] ?>" class="btn btn-danger del">Delete</button>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php if (mysqli_num_rows($select_brand) == '0') { ?>
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