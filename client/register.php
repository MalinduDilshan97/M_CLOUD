<?php
/**
 * Created by IntelliJ IDEA.
 * User: SL_WOLF
 * Date: 1/31/2018
 * Time: 5:40 PM
 */

//include "headerLogin.php";
?>

<?php
ob_start();
session_start();
if (isset($_SESSION['user']) != "") {
    header("Location: overview.php");
}
include_once 'dbconnect.php';

$error = false;

if (isset($_POST['btn-signup'])) {

    // clean user inputs to prevent sql injections1
    $id=0;

    $name = trim($_POST['name']);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    // basic name validation
    if (empty($name)) {
        $error = true;
        $nameError = "Please enter your full name.";
    } else if (strlen($name) < 3) {
        $error = true;
        $nameError = "Name must have atleat 3 characters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $error = true;
        $nameError = "Name must contain alphabets and space.";
    }

    //basic email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $emailError = "Please enter valid email address.";
    } else {
        // check email exist or not
        $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
        $result = mysql_query($query);
        $count = mysql_num_rows($result);
        if ($count != 0) {
            $error = true;
            $emailError = "Provided Email is already in use.";
        }
    }
    // password validation
    if (empty($pass)) {
        $error = true;
        $passError = "Please enter password.";
    } else if (strlen($pass) < 6) {
        $error = true;
        $passError = "Password must have atleast 6 characters.";
    }

    // password encrypt using SHA256();
   // $password = hash('sha256', $pass);

    // if there's no error, continue to signup
    if (!$error) {

        $space=5;

        $query = "INSERT INTO users(userName,userEmail,userPass,userSpace) VALUES('$name','$email','$pass',$space)";
        $res = mysql_query($query);

        if ($res) {
            $errTyp = "success";
            $errMSG = "Successfully registered, you may login now";
            unset($name);
            unset($email);
            unset($pass);
        } else {
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again later...";
        }

    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>M-Cloud Register</title>
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<br>
<br>
<div class="header">
    <h1> Fill The Details</h1>
</div>
<div class="login-box">
    <div class="login-box-body">

        <div id="login-form">
            <form method="post" class="forms" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                <div class="form-group">
                    <hr/>
                </div>

                <?php
                if (isset($errMSG)) {

                    ?>
                    <div class="form-group">
                        <div class="alert alert-<?php echo ($errTyp == "success") ? "success" : $errTyp; ?>">
                            <i class="fa fa-info" aria-hidden="true"
                               style="font-size: 20px"></i>&nbsp;<?php echo $errMSG; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <div class="form-group">
                    <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"
                                                               style="font-size: 19px"></i></span>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50"
                               value="<?php echo $name ?>"/>
                    </div>
                    <span class="text-danger"><?php echo $nameError; ?></span>
                </div>

                <div class="form-group">
                    <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-address-book" aria-hidden="true"
                                                               style="font-size: 15px"></i></span>
                        <input type="email" name="email" class="form-control" placeholder="Enter Your Email"
                               maxlength="40" value="<?php echo $email ?>"/>
                    </div>
                    <span class="text-danger"><?php echo $emailError; ?></span>
                </div>

                <div class="form-group">
                    <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"
                                                               style="font-size: 20px"></i></span>
                        <input type="password" name="pass" class="form-control" placeholder="Enter Password"
                               maxlength="15"/>
                    </div>
                    <span class="text-danger"><?php echo $passError; ?></span>
                </div>

                <div class="form-group">
                    <hr/>
                </div>

                <div class="form-group">
                    <button type="submit" id="signUp" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
                </div>

                <div class="form-group">
                    <hr/>
                </div>

                <div class="form-group tt">
                    <a href="index.php">Sign in Here...</a>
                </div>

        </div>

        </form>
    </div>
</div>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="dist/js/uploadImage.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>
