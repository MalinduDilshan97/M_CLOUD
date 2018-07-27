<?php
/**
 * Created by IntelliJ IDEA.
 * User: SL_WOLF
 * Date: 2/4/2018
 * Time: 7:58 PM
 */

$email=$_POST["email"];
$gb=$_POST["amountGb"];

$id=0;
$name=$_POST["holder"];
$card=$_POST["card"];
$price=$_POST["priceFor"];
$date=date('m/d/Y');

$connection = mysqli_connect("localhost","root","1234","cloud","3306");

if (!$connection){
    echo mysqli_connect_error();
}else{

    mysqli_autocommit($connection,FALSE);


        $result = mysqli_query($connection, "Update Users set userSpace=$gb where userEmail='$email'");

    if ($result && mysqli_affected_rows($connection) > 0){

        $result = mysqli_query($connection, "INSERT INTO Payment VALUES($id,'$name','$card','$date','$price','$email')");

        if ($result && mysqli_affected_rows($connection) > 0){
            mysqli_commit($connection);
            ?>
            <script>
                alert('successfully Upgraded Your Account');
                window.location.href='upgrade-account.php?Upgrade Account';
            </script>
            <?php
            //header("Location: upgrade-account.php?title=Upgrade Account");
        }else{
            mysqli_rollback($connection);
            echo "Failed to add payment <br>",mysqli_error($connection);
        }

    }else{
        mysqli_rollback($connection);
        echo "Failed to Update <br>",mysqli_error($connection);
    }

    mysqli_autocommit($connection, TRUE);
    mysqli_close($connection);
}