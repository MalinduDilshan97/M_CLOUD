<?php
/**
 * Created by IntelliJ IDEA.
 * User: SL_WOLF
 * Date: 2/3/2018
 * Time: 8:37 PM
 */

$connection = mysqli_connect("localhost", "root", "1234", "cloud", "3306");

$value = $_GET["upId"];

if (!$connection) {
    echo mysqli_connect_error();

} else {

        $query = "delete from upload where id='$value' ";
        $result = mysqli_query($connection, $query);

        if ($result && mysqli_affected_rows($connection) > 0) {
            header("Location: view-files.php?title=View Files");
        } else {
            mysqli_error($connection);
        }

}
mysqli_close($connection);