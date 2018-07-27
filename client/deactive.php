<?php
///**
// * Created by IntelliJ IDEA.
// * User: SL_WOLF
// * Date: 2/6/2018
// * Time: 7:40 PM
// */
//
//$email=$_POST['email'];
//
//
//$connection = mysqli_connect("localhost","root","1234","cloud","3306");
//
//if (!$connection){
//    echo mysqli_connect_error();
//}else{
//
//
//    $result = mysqli_query($connection, "DELETE FROM users where userEmail='$email'");
//
//    if($result){
//        session_start();
//
//        if (!isset($_SESSION['user'])) {
//            header("Location: index.php");
//        } else if(isset($_SESSION['user'])!="") {
//            header("Location: overview.php");
//        }
//
//        if (isset($_GET['logout'])) {
//            unset($_SESSION['user']);
//            session_unset();
//            session_destroy();
//            header("Location: index.php");
//            exit;
//        }
//
//    }else{
//
//        echo "Failed";
//        echo mysqli_error($connection);
//    }
//
//    mysqli_close($connection);
//}