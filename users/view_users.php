<?php 
session_start();
require '../db.php';

$select_user = "SELECT * FROM users";
$select_user_result = mysqli_query($db_connect, $select_user);


?>

<?php 
require '../dashboard_header.php';
?>

<div class="">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card mt-5">
                <div class="card-header bg-primary">
                    <h3 class="text-white">User List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach($select_user_result as $sl=>$user){?>
                        <tr>
                            <td><?=$sl+1?></td>
                            <td><?=$user['name']?></td>
                            <td><?=$user['email']?></td>
                            <td><img width="50" src="/tiger/uploads/user/<?=$user['profile_photo']?>" alt=""></td>
                            <td>
                                <a href="edit_user.php?id=<?=$user['id']?>" class="btn btn-success">Edit</a>
                                <a class="btn btn-danger del text-white" value="delete_user.php?id=<?=$user['id']?>">Delete</a>
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
