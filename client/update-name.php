<?php
/**
 * Created by IntelliJ IDEA.
 * User: SL_WOLF
 * Date: 2/6/2018
 * Time: 2:17 PM
 */

$email=$_POST['email'];
$name=$_POST['newName'];

$connection = mysqli_connect("localhost","root","1234","cloud","3306");

if (!$connection){
    echo mysqli_connect_error();
}else{


    $result = mysqli_query($connection, "Update users set userName='$name' where userEmail='$email'");

    if($result){
        header("Location: settings.php?title=Settings");

    }else{

        echo "Failed";
        echo mysqli_error($connection);
    }

    mysqli_close($connection);
}