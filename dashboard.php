<?php 
session_start();
if(!isset($_SESSION['login_korchi'])){
    header('location:login.php');
}

require 'dashboard_header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Welcome, <?=$_SESSION['name']?> </h3>
                </div>
                <div class="card-body">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, voluptatum dicta illum at quod nihil velit dolores explicabo repellendus, adipisci voluptate quibusdam repudiandae! Inventore, perspiciatis. Officiis quae iusto aut blanditiis?</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
require 'dashboard_footer.php';
?>
<?php if(isset($_SESSION['login_korchi_alert'])) { ?>
    <script>
        const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        Toast.fire({
        icon: 'success',
        title: 'Signed in successfully'
        })
    </script>
<?php } unset($_SESSION['login_korchi_alert'])?>