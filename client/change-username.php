<?php
/**
 * Created by IntelliJ IDEA.
 * User: SL_WOLF
 * Date: 2/6/2018
 * Time: 2:08 PM
 */

require 'header.php';

$email=$_POST['email'];
$name=$_POST['name'];

?>

<section class="invoice">

    <input type="text" id="txtEmail" name="email" value="<?php echo $email ?>">

    <div class="form-group">
        <label>Current Username</label>
        <input type="text" class="form-control" id="txtName" value="<?php echo $name ?>" name="name" readonly>
    </div>

    <div class="form-group">
        <label>Enter  Your New Username</label>
        <input type="text" class="form-control" id="txtNewName" name="newName">
    </div>

    <br>
    <div>
        <button id="btnChngUsername" name="ChngUsername" class="btn btn-primary" type="submit"><i class="fa fa-cog"></i>&nbsp; Change</button>
    </div>


</section>



<?php
require 'footer.php';
?>
