<?php
/**
 * Created by IntelliJ IDEA.
 * User: SL_WOLF
 * Date: 2/6/2018
 * Time: 7:17 PM
 */

require 'header.php';

$email=$_POST['email'];

?>

<input type="text" id="txtEmail" name="email" value="<?php echo $email ?>">

<section class="invoice">
    <label>By Deactivating Your Account You will Lost All Your Saved Data And There will Be No Refund</label><br>
    <label>If You Agree To These Conditions Deactivate Your Account,</label><br>
    <label>And Thank You For Staying With Us </label>
</section>

<section class="invoice">
    <label>Are You Sure Do You Want To Deactivate Your Account? </label><br>
    <button id="btndeactivate" type="button" class="btn btn-danger">Yes I Want To Deactivate My Account</button>&nbsp;&nbsp;&nbsp;&nbsp;
    <button id="btnback" type="button" class="btn btn-success">No I Don't Want To Deactivate My Account </button>
</section>

<?php

require 'footer.php';
?>
