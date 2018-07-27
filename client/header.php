<?php
/**
 * Created by IntelliJ IDEA.
 * User: SL_WOLF
 * Date: 1/23/2018
 * Time: 6:00 PM
 */

ob_start();
session_start();
require_once 'dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['user']) ) {
    header("Location: index.php");
    exit;
}
// select loggedin users detail
$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>
<?php

if (!empty($_GET["title"])){
    $title = $_GET["title"];
}else{
    $title = "Overview";
}

?>
<?php
$connection = mysqli_connect("localhost", "root", "1234", "cloud", "3306");
$row=mysqli_query($connection,"SELECT file FROM image WHERE email='{$userRow['userEmail']}'");
$data=mysqli_fetch_array($row);
$email=$userRow['userEmail'];
$spa= mysql_query("select userSpace from users WHERE userEmail='$email'");
$spaceRow=mysql_fetch_array($spa);
$space=$spaceRow['userSpace'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>M-Cloud | <?=$title?> </title>
    <link rel="icon" type="image/png" href="images/clo.ico">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link rel="stylesheet" href="dist/css/animate.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/slide.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="overiew.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><i class="fa fa-cloud"></i> </span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b><i class="fa fa-cloud"></i>&nbsp;&nbsp;M&nbsp;-&nbsp;Cloud</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="images/<?= $data[0] ?>" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?= $userRow['userEmail']; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="images/<?= $data[0] ?>" class="img-circle" alt="User Image">
                            </li>
                            <!-- Menu Body -->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="logout.php?logout" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="images/<?= $data[0] ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?= $userRow['userName']; ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="<?= ($title === "Overview")? "active" : ""  ?>">
                    <a href="overiew.php?title=Overview">
                        <i class="fa fa-navicon"></i> <span> Overview</span>
                    </a>
                </li>
                <li class="<?= ($title === "Upload")? "active" : ""  ?>">
                    <a href="choose-upload.php?title=Upload">
                        <i class="fa fa-cloud-upload"></i> <span> Upload Files</span>
                    </a>
                </li>
                <li class="<?= ($title === "Download")? "active" : ""  ?>">
                    <a href="download-file.php?title=Download">
                        <i class="fa fa-cloud-download"></i> <span> Download Files</span>
                    </a>
                </li>
                <li class="<?= ($title === "View Files")? "active" : ""  ?>">
                    <a href="view-files.php?title=View Files">
                        <i class="fa fa-server"></i> <span> View Files</span>
                    </a>
                </li>
                <li class="<?= ($title === "Upgrade Account")? "active" : ""  ?>">
                    <a href="upgrade-account.php?title=Upgrade Account">
                        <i class="fa fa-level-up"></i> <span> Upgrade Your Account</span>
                    </a>
                </li>
                <li class="<?= ($title === "Transactions History")? "active" : ""  ?>">
                    <a href="transaction.php?title=Transactions History">
                        <i class="fa fa-money"></i> <span>Your Transactions History</span>
                    </a>
                </li>
                <li class="<?= ($title === "Settings")? "active" : ""  ?>">
                    <a href="settings.php?title=Settings">
                        <i class="fa fa-cogs"></i> <span> Settings</span>
                    </a>
                </li>


            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?=$title?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="overiew.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><?=$title?></li>
            </ol>
        </section>
        <form id="frm" action="" method="POST" enctype="multipart/form-data">
            <!--            <div class="row">-->
            <!--                <section class="col-lg-5 connectedSortable">-->


