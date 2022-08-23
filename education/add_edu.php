<?php

    session_start();
    require '../db.php';

    $select_edu = "SELECT * FROM educations";
    $select_edu_banner = mysqli_query($db_connect, $select_edu);

     
    require '../dashboard_header.php';
?>

<div class="container">
    <div class="row">
         <div class="col-lg-9 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Educational Qualification List</h3>
                </div>
                <div class="card-body">
                    <table class = "table table-stripped">
                        <tr>
                            <th>SL.</th>
                            <th>Title</th>
                            <th>Percentage</th>
                            <th>Year</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($select_edu_banner as $key=>$sel_edu){?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><?=$sel_edu['title']?></td>
                            <td><?=$sel_edu['percentage']?></td>
                            <td><?=$sel_edu['year']?></td>
                            <td>
                                <a href ="edu_status.php?id=<?=$sel_edu['id']?>" class = "btn btn-<?=($sel_edu['status'] == 0?'secondary':'success')?>"><?=($sel_edu['status'] == 0?'deactive':'active')?></a>
                            </td>
                            <td>
                                <a href="edit_education.php?id=<?=$sel_edu['id']?>" class = "btn btn-primary">Edit</a>
                                <a href="delete_edu.php?id=<?=$sel_edu['id']?>" class = "btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php }?>
                        <?php if (mysqli_num_rows($select_edu_banner) == '0'){?>
                            <tr>
                                <td class = "text-center text-danger" colspan = "5">
                                    <strong>No Data Found</strong>
                                </td>
                            </tr>
                        <?php }?>
                    </table>
                </div>
            </div> 

           
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h3>Add Educational Qualification</h3>
                </div>
                <div class="card-body">
                    <form action="education_post.php" method = "POST">
                        <div class="mb-3">
                            <input type="text" class = "form-control" name = "title" placeholder = "Title">
                        </div>
                        <div class="mb-3">
                            <input type="number" class = "form-control" name = "percentage" placeholder = "Percentage">
                        </div>
                        <div class="mb-3">
                            <input type="number" class = "form-control" name = "year" placeholder = "Year">
                        </div>
                        <div class="mb-3">
                            <button type = "submit" class = "btn btn-primary">Add Content</button>
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

<?php if(isset($_SESSION['del'])){?>
    <script>
        Swal.fire({
        icon: 'error',
        title: '<?=$_SESSION['del']?>',
        })
    </script>
<?php } unset($_SESSION['del'])?>

<?php if(isset($_SESSION['update'])){?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '<?=$_SESSION['update']?>',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
<?php } unset($_SESSION['update'])?>

<?php if(isset($_SESSION['extension'])){?>
    <script>
        Swal.fire({
        icon: 'error',
        title: '<?=$_SESSION['extension']?>',
        })
    </script>
<?php } unset($_SESSION['extension'])?>

<?php if(isset($_SESSION['size'])){?>
    <script>
        Swal.fire({
        icon: 'error',
        title: '<?=$_SESSION['size']?>',
        })
    </script>
<?php } unset($_SESSION['size'])?>
