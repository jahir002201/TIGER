<?php
require 'db.php';
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="/tiger/backend/bootstrap/css/bootstrap.min.css">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Theme style -->
  <link rel="stylesheet" href="/tiger/backend/css/style.css">
  <link rel="stylesheet" href="/tiger/backend/css/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/tiger/backend/css/et-line-font/et-line-font.css">
  <link rel="stylesheet" href="/tiger/backend/css/themify-icons/themify-icons.css">

  <!-- Chartist CSS -->
  <link rel="stylesheet" href="/tiger/backend/plugins/chartist-js/chartist.min.css">
  <link rel="stylesheet" href="/tiger/backend/plugins/chartist-js/chartist-init.css">
  <link rel="stylesheet" href="/tiger/backend/plugins/chartist-js/chartist-plugin-tooltip.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper boxed-wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="index.html" class="logo blue-bg">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="dist/img/logo-n.png" alt=""></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="dist/img/logo.png" alt=""></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar blue-bg navbar-static-top">
        <!-- Sidebar toggle button-->
        <ul class="nav navbar-nav pull-left">
          <li><a class="sidebar-toggle" data-toggle="push-menu" href=""></a> </li>
        </ul>
        <div class="pull-left search-box">
          <form action="#" method="get" class="search-form">
            <div class="input-group">
              <input name="search" class="form-control" placeholder="Search..." type="text">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i> </button>
              </span>
            </div>
          </form>
          <!-- search form -->
        </div>
        <div class="navbar-custom-menu">
          <?php
          $total_unread_mesg = "SELECT COUNT(*) as unread FROM messages WHERE status=0";
          $total_unread_mesg_res = mysqli_query($db_connect, $total_unread_mesg);
          $after_assoc_unread = mysqli_fetch_assoc($total_unread_mesg_res);

          $total_unread = "SELECT * FROM messages WHERE status=0";
          $total_unread_res = mysqli_query($db_connect, $total_unread);
          ?>
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-envelope-o"></i>
                <div class="notify"> <span class=" text-danger" ><?= $after_assoc_unread['unread'] ?></span> </div>
              </a>
              <ul class="dropdown-menu">

                <li class="header">You have <?= $after_assoc_unread['unread'] ?> new messages</li>
                <li>
                  <ul class="menu">
                    <?php foreach ($total_unread_res as $unread) { ?>
                      <li><a href="/tiger/inbox/view.php?id=<?= $unread['id'] ?>">
                          <div class="pull-left"><img src="/tiger/backend/img/img1.jpg" class="img-circle" alt="User Image"> <span class="profile-status online pull-right"></span></div>
                          <h4><?= $unread['name'] ?></h4>
                          <p><?= substr($unread['message'], 0, 20) ?></p>
                          <p><span class="time">9:30 AM</span></p>
                        </a>
                      </li>
                    <?php } ?>
                  </ul>
                </li>
                <li class="footer"><a href="#">View All Messages</a></li>
              </ul>
            </li>
            <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown messages-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bell-o"></i>
                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
              </a>
              <ul class="dropdown-menu">
                <li class="header">Notifications</li>
                <li>
                  <ul class="menu">
                    <li><a href="#">
                        <div class="pull-left icon-circle red"><i class="icon-lightbulb"></i></div>
                        <h4>Alex C. Patton</h4>
                        <p>I've finished it! See you so...</p>
                        <p><span class="time">9:30 AM</span></p>
                      </a></li>
                    <li><a href="#">
                        <div class="pull-left icon-circle blue"><i class="fa fa-coffee"></i></div>
                        <h4>Nikolaj S. Henriksen</h4>
                        <p>I've finished it! See you so...</p>
                        <p><span class="time">1:30 AM</span></p>
                      </a></li>
                    <li><a href="#">
                        <div class="pull-left icon-circle green"><i class="fa fa-paperclip"></i></div>
                        <h4>Kasper S. Jessen</h4>
                        <p>I've finished it! See you so...</p>
                        <p><span class="time">9:30 AM</span></p>
                      </a></li>
                    <li><a href="#">
                        <div class="pull-left icon-circle yellow"><i class="fa  fa-plane"></i></div>
                        <h4>Florence S. Kasper</h4>
                        <p>I've finished it! See you so...</p>
                        <p><span class="time">11:10 AM</span></p>
                      </a></li>
                  </ul>
                </li>
                <li class="footer"><a href="#">Check all Notifications</a></li>
              </ul>
            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu p-ph-res"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="/tiger/uploads/user/<?= $_SESSION['photo'] ?>" class="user-image" alt="User Image"> <span class="hidden-xs"><?= $_SESSION['name'] ?></span> </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                  <div class="pull-left user-img"><img src="/tiger/uploads/user/<?= $_SESSION['photo'] ?>" class="img-responsive" alt="User"></div>
                  <p class="text-left">Florence Douglas <small>florence@gmail.com</small> </p>
                  <div class="view-link text-left"><a href="#">View Profile</a> </div>
                </li>
                <li><a href="#"><i class="icon-profile-male"></i> My Profile</a></li>
                <li><a href="/tiger/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="image text-center"><img src="/tiger/uploads/user/<?= $_SESSION['photo'] ?>" alt="User Image"> </div>
          <div class="info">
            <p><?= $_SESSION['name'] ?></p>
            <a href="#"><i class="fa fa-cog"></i></a> <a href="#"><i class="fa fa-envelope-o"></i></a> <a href="#"><i class="fa fa-power-off"></i></a>
          </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="active"> <a href="/tiger/dashboard.php"> <i class="fa fa-dashboard"></i> Home </a>
          </li>
          <li class="treeview"> <a href="#"> <i class="fa fa-bullseye"></i> <span>Users</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
            <ul class="treeview-menu">
              <li><a href="/tiger/users/view_users.php">User List</a></li>
            </ul>
          </li>
          <li class="treeview"> <a href="#"> <i class="fa fa-bullseye"></i> <span>Banners</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
            <ul class="treeview-menu">
              <li><a href="/tiger/banners/add_banner.php">Add Banner Content</a></li>
            </ul>
          </li>
          <li class="treeview"> <a href="#"> <i class="fa fa-bullseye"></i> <span>Social Icon</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
            <ul class="treeview-menu">
              <li><a href="/tiger/social/add_social.php">Add Icon</a></li>
            </ul>
          </li>
          <li class="treeview"> <a href="#"> <i class="fa fa-bullseye"></i> <span>About</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
            <ul class="treeview-menu">
              <li><a href="/tiger/about/edit_about.php">Add About Content</a></li>
              <li><a href="/tiger/education/add_edu.php">Add Education Content</a></li>
            </ul>
          </li>
          <li class="treeview"> <a href="#"> <i class="fa fa-bullseye"></i> <span>Services</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
            <ul class="treeview-menu">
              <li><a href="/tiger/services/add_service.php">Add Service Content</a></li>
            </ul>
          </li>
          <li class="treeview"> <a href="#"> <i class="fa fa-bullseye"></i> <span>Works</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
            <ul class="treeview-menu">
              <li><a href="/tiger/works/add_work.php">Add Works Content</a></li>
            </ul>
          </li>
          <li class="treeview"> <a href="#"> <i class="fa fa-bullseye"></i> <span>Facts</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
            <ul class="treeview-menu">
              <li><a href="/tiger/facts/add_fact.php">Add Fact Content</a></li>
            </ul>
          </li>
          <li class="treeview"> <a href="#"> <i class="fa fa-bullseye"></i> <span>Feedback</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
            <ul class="treeview-menu">
              <li><a href="/tiger/feedback/add_feedback.php">Add Feedback</a></li>
            </ul>
          </li>
          <li class="treeview"> <a href="#"> <i class="fa fa-bullseye"></i> <span>Brand Photo</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
            <ul class="treeview-menu">
              <li><a href="/tiger/brand/add_brand.php">Add Brand Photo</a></li>
            </ul>
          </li>
          <li class="treeview"> <a href="#"> <i class="fa fa-bullseye"></i> <span>Contact Information</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
            <ul class="treeview-menu">
              <li><a href="/tiger/contact/edit_contact.php">Edit Contact</a></li>
            </ul>
          </li>

          <li class="treeview"> <a href="#"> <i class="fa fa-bullseye"></i> <span>Inbox</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
            <ul class="treeview-menu">
              <li><a href="/tiger/inbox/message_list.php">Message</a></li>
            </ul>
          </li>

        </ul>
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header sty-one">
        <h1>Dashboard</h1>
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li><i class="fa fa-angle-right"></i> Dashboard</li>
        </ol>
      </div>

      <!-- Main content -->
      <div class="content">