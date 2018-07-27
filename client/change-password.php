<?php
/**
 * Created by IntelliJ IDEA.
 * User: SL_WOLF
 * Date: 2/6/2018
 * Time: 2:26 PM
 */

require 'header.php';

$email=$_POST['email'];


?>

<section class="invoice">

    <input type="text" id="txtEmail" name="email" value="<?php echo $email ?>">

    <div class="form-group">
        <label>Enter Your Current Password</label>
        <input type="text" class="form-control"  >
    </div>

    <div class="form-group">
        <label>Enter Your New Password</label>
        <input type="text" class="form-control" id="txtNewPass" name="newPass">
    </div>

    <br>
    <div>
        <button id="btnChngPass" name="ChngPass" class="btn btn-primary" type="submit"><i class="fa fa-cog"></i>&nbsp; Change</button>
    </div>


</section>



<?php
require 'footer.php';
?>
