<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Niche Admin - Powerful Bootstrap 4 Dashboard and Admin Template</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />

<!-- v4.0.0-alpha.6 -->
<link rel="stylesheet" href="backend/bootstrap/css/bootstrap.min.css">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Theme style -->
<link rel="stylesheet" href="backend/css/style.css">
<link rel="stylesheet" href="backend/css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="backend/css/et-line-font/et-line-font.css">
<link rel="stylesheet" href="backend/css/themify-icons/themify-icons.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-box-body">
    <h3 class="login-box-msg">Sign Up</h3>
    <?php if(isset($_SESSION['success'])){ ?>
        <div class="alert alert-success"><?=$_SESSION['success']?></div>
    <?php } unset($_SESSION['success'])?>
    <form action="register_post.php" method="post" enctype="multipart/form-data">
      <div class="form-group has-feedback">
        <input type="text" class="form-control sty1 <?=(isset($_SESSION['errors']['name'])?'border border-danger':'')?>" id="name" name="name" placeholder="Name" value="<?=(isset($_SESSION['name'])?$_SESSION['name']:'')?>">
        <?php if(isset($_SESSION['errors']['name'])){ ?>
            <strong class="text-danger"><?=$_SESSION['errors']['name']?></strong>
        <?php } ?>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control sty1" name="email" placeholder="Email">
        <?php if(isset($_SESSION['errors']['email'])){ ?>
            <strong class="text-danger"><?=$_SESSION['errors']['email']?></strong>
        <?php } ?>
         <?php if(isset($_SESSION['invalid'])){ ?>
            <strong class="text-danger"><?=$_SESSION['invalid']?></strong>
        <?php } ?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control sty1" placeholder="Password">
        <?php if(isset($_SESSION['errors']['password'])){ ?>
            <strong class="text-danger"><?=$_SESSION['errors']['password']?></strong>
        <?php } ?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="confirm_password" class="form-control sty1" placeholder="Conform Password">
        <?php if(isset($_SESSION['errors']['confirm_password'])){ ?>
            <strong class="text-danger"><?=$_SESSION['errors']['confirm_password']?></strong>
        <?php } ?>
        <?php if(isset($_SESSION['pass'])){ ?>
            <strong class="text-danger"><?=$_SESSION['pass']?></strong>
        <?php } ?>
      </div>
      <div class="mb-3">
            <label for="" class="form-label">Profile Photo</label>
            <input type="file" name="profile_photo" class="form-control"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
            <br>
            <img width="300" src="" id="blah" alt="">
            <?php if(isset($_SESSION['extension'])){ ?>
                <div class="alert alert-warning"><?=$_SESSION['extension']?></div>
            <?php } unset($_SESSION['extension'])?>
            <?php if(isset($_SESSION['size'])){ ?>
                <div class="alert alert-warning"><?=$_SESSION['size']?></div>
            <?php } unset($_SESSION['size'])?>
        </div>
      <div>
        <!-- /.col -->
        <div class="col-xs-4 m-t-1">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign UP</button>
        </div>
        <!-- /.col --> 
      </div>
    </form>
    <div class="m-t-2">Already have an account? <a href="login.php" class="text-center">Sign In</a></div>
  </div>
  <!-- /.login-box-body --> 
</div>
<!-- /.login-box --> 

<!-- jQuery 3 --> 
<script src="backend/js/jquery.min.js"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="backend/bootstrap/js/bootstrap.min.js"></script> 
<!-- template --> 
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="backend/js/niche.js"></script>
</body>
</html>

<?php if(isset($_SESSION['email_exist'])){?>
    <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?=$_SESSION['email_exist']?>',
        })
    </script>
<?php } unset($_SESSION['email_exist'])?>

<?php 
unset($_SESSION['errors']);
unset($_SESSION['name']);
unset($_SESSION['invalid']);
unset($_SESSION['pass']);

?>