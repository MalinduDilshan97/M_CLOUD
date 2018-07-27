<?php
/**
 * Created by IntelliJ IDEA.
 * User: SL_WOLF
 * Date: 2/4/2018
 * Time: 8:35 PM
 */

require 'header.php';

$connection=mysqli_connect("localhost", "root","1234", "cloud", "3306");
if (!$connection){
    echo mysqi_connect_error();
}else{
    $name;
    $resultset = mysqli_query($connection, "select * from users WHERE userEmail='$email'");

    while ($rowData = mysqli_fetch_row($resultset)) {
        $name=$rowData[1];
    }

    mysqli_free_result($resultset);

    mysqli_close($connection);
}

?>

<section class="invoice">

    <input type="text" id="txtEmail" name="email" value="<?php echo $email ?>">

    <div class="form-group">
        <label>User Name</label>
        <input type="text" class="form-control" id="txtName" value="<?php echo $name ?>" name="name" readonly>
        <br>
        <button id="userNameChng" type="button" class="btn btn-success">Click To change Username </button>
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="text" class="form-control" id="txtPass" value="**********"  readonly>
        <br>
        <button id="passChng" type="button" class="btn btn-success">Click To change Password </button>
    </div>



</section>

<section class="invoice">

    <div class="form-group">
        <label>Deactivate Your Account</label>
        <br>
        <button id="deactivate" type="button" class="btn btn-danger">Click To Deactivate Your Account </button>
    </div>

</section>

<?php
require 'footer.php';
?>
