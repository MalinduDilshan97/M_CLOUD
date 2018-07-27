<?php
/**
 * Created by IntelliJ IDEA.
 * User: SL_WOLF
 * Date: 2/5/2018
 * Time: 8:47 PM
 */

include_once 'dbconnect.php';

$email=$_POST['email'];
$desc=$_POST['desc-file'];

if(isset($_POST['btn-upload']))
{

    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $folder="C:\wamp64\www\Idea\cloud\storage/";

    // new file size in KB
    $new_size = $file_size/1024;
    // new file size in KB

    // make file name in lower case
    $new_file_name = strtolower($file);
    // make file name in lower case

    $final_file=str_replace(' ','-',$new_file_name);

    if(move_uploaded_file($file_loc,$folder.$final_file))
    {
        $sql="INSERT INTO upload(file,type,size,description,email) VALUES('$final_file','$file_type','$new_size','$desc','$email')";
        mysql_query($sql);
        ?>
        <script>
            alert('successfully uploaded');
            window.location.href='choose-upload.php?Upload';
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            alert('error while uploading file');
            window.location.href='index.php?fail';
        </script>
        <?php
    }
}
?>