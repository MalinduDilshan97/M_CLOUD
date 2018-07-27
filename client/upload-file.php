<?php
/**
 * Created by IntelliJ IDEA.
 * User: SL_WOLF
 * Date: 2/3/2018
 * Time: 7:01 PM
 */

$connection = mysqli_connect("localhost","root","1234","cloud","3306");

$email=$_POST['email'];
$desc=$_POST['desc-file'];
$size=$_POST['size'];

if(isset($_POST['btn-upload']))
{
    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $path = $_FILES['file']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $folder="C:\wamp64\www\Idea\cloud\storage/";

    move_uploaded_file($file_loc,$folder.$file);
    $sql="INSERT INTO upload(file,type,size,description,email) VALUES('$file','$ext','$size','$desc','$email')";
    $result=mysqli_query($connection,$sql);
    if($result){
        ?>
        <script>
            alert('successfully uploaded');
            window.location.href='choose-upload.php?Upload';
        </script>
        <?php
        //header("Location: choose-upload.php?title=Upload");

    }else{

        echo "Failed";
        echo mysqli_error($connection);
    }
}



