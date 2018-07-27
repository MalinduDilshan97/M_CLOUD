<?php
/**
 * Created by IntelliJ IDEA.
 * User: SL_WOLF
 * Date: 2/2/2018
 * Time: 7:43 PM
 */


session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
} else if(isset($_SESSION['user'])!="") {
    header("Location: overview.php");
}

if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}