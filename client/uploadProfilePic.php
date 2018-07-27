<?php
/**
 * Created by IntelliJ IDEA.
 * User: SL_WOLF
 * Date: 2/2/2018
 * Time: 7:30 PM
 */
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>M-Cloud Profile Image</title>
    <link rel="icon" type="image/png" href="images/clo.ico">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="dist/css/style3.css" type="text/css"/>
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="dist/css/loginStyle.css">
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
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

    <link rel="stylesheet" href="dist/css/style3.css">

    <link href="loginUtil/style.css" rel="stylesheet" type="text/css" media="all" />

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
<body class="hold-transition login-page">
<br>
<br>
<div class="header">
    <h1> Upload Profile Picture</h1>
</div>
<div class="login-box">
    <div class="login-box-body">

        <form class="forms" action="uploadImage.php" method="POST" enctype="multipart/form-data">

            <div class="box-header" style="left: 25%">
                <div class="form-group">
                    <div id="profile-container"
                         style="width: 150px;height: 150px;overflow: hidden;-webkit-border-radius: 50%;-moz-border-radius: 50%;-ms-border-radius: 50%;-o-border-radius: 50%;border-radius: 50%;">
                        <img id="profileImage" src="images/Placeholder.jpg">
                        <input id="imageUpload" type="file" name="file" placeholder="Photo" required=""/>
                    </div>
                </div>
            </div>

            <div class="box-body">

                <div class="form-group">
                    <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-address-book" aria-hidden="true"
                                                               style="font-size: 15px"></i></span>
                        <input type="email" name="email" class="form-control" placeholder="Enter Your Email"
                               maxlength="40"/>
                    </div>
                    <br>
                    <div class="input-group" style="left: 46%">
                        <button type="submit" class="btn btn-block bg-purple" name="btn-upload">Upload Profile Picture</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
</div>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="dist/js/uploadImage.js"></script>
</body>
</html>
