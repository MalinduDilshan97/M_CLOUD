<?php
/**
 * Created by IntelliJ IDEA.
 * User: SL_WOLF
 * Date: 2/2/2018
 * Time: 10:53 PM
 */
require 'header.php';

$connection=mysqli_connect("localhost", "root","1234", "cloud", "3306");
if (!$connection){
    echo mysqi_connect_error();
}else{
    $used=0;
$resultset = mysqli_query($connection, "select * from upload WHERE email='$email'");

    while ($rowData = mysqli_fetch_row($resultset)) {
        $fileSize=$rowData[3];
        $used=$used+$fileSize;
    }

    mysqli_free_result($resultset);

    mysqli_close($connection);
}
$used=$used/1024;
$used=$used/1024;
$used=$used/1024;

$presentage=$space/100;
$presentage=$presentage*$used;

?>

<section class="invoice">
    <div class="info-box bg-green-gradient">
        <span class="info-box-icon"><i class="fa fa-pie-chart"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">Used Storage</span>
            <span class="info-box-number"><?php echo $used ?>&nbsp;GB</span>
            <!-- The progress section is optional -->
            <div class="progress">
                <div class="progress-bar" style="width: <?php echo $presentage ?>%"></div>
            </div>
            <span class="progress-description">Total Storage&nbsp;&nbsp;<?php echo $space ?>&nbsp;GB</span>
        </div>
    </div>

</section>

<section class="invoice">
    

        <input type="text" id="txtEmail" name="email" value="<?php echo $email ?>">

        <div class="form-group">
            <label>File Description</label>
            <input type="text" class="form-control" id="txtDesc" placeholder="Enter Description to File" name="desc-file">
        </div>

        <div class="form-group">
            <label>Choose a File</label>
            <input id="btnfileChoose" type="file" name="file" placeholder="File" required=""/>
        </div>

        <input id="txtsize" name="size">

        <br>
        <div>
            <button id="btnUpload" name="btn-upload" class="btn btn-primary" type="submit"><i class="fa fa-upload"></i>&nbsp; Upload File</button>
        </div>




</section>

<?php

require 'footer.php';
?>
