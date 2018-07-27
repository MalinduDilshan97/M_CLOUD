<?php
/**
 * Created by IntelliJ IDEA.
 * User: SL_WOLF
 * Date: 2/2/2018
 * Time: 7:35 PM
 */

$connection = mysqli_connect("localhost","root","1234","cloud","3306");

$email=$_POST['email'];

if(isset($_POST['btn-upload']))
{
    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $folder="C:\wamp64\www\Idea\cloud\images/";

    move_uploaded_file($file_loc,$folder.$file);
    $sql="INSERT INTO image(file,type,size,email) VALUES('$file','$file_type','$file_size','$email')";
    $result=mysqli_query($connection,$sql);
    if($result){
        header("Location: register.php");
    }else{
        echo mysqli_error($connection);
    }
}