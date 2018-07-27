<?php
/**
 * Created by IntelliJ IDEA.
 * User: SL_WOLF
 * Date: 2/2/2018
 * Time: 10:56 PM
 */
require 'header.php';

$connection=mysqli_connect("localhost", "root","1234", "cloud", "3306");
if (!$connection){
    echo mysqi_connect_error();
}else{
$resultset = mysqli_query($connection, "select * from upload WHERE email='$email'");



?>

<section class="invoice">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
                <div class="row box-pane">
                    <div class="col-sm-12">
                        <table class="table" id="tableN">
                            <thead style="background-color: #001F3F;color: white">
                            <tr>
                                <th>Upload File ID</th>
                                <th>File</th>
                                <th>File Type</th>
                                <th>File Size<small>&nbsp;&nbsp;(kb)</small></th>
                                <th>Description</th>
                                <th>Download</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            while ($rowData = mysqli_fetch_row($resultset)) {
                                $fileSize=$rowData[3];
                                $fileSize=$fileSize/1024;

                                echo "<tr>
                            <td class='upId'>$rowData[0]</td>
                            <td class='file'>$rowData[1]</td>
                             <td class='type'>$rowData[2]</td>
                              <td class='size'>$fileSize</td>
                              <td class='description'>$rowData[4]</td>
                            <td><a class='btnTrash' href='download.php ? file=$rowData[1] '><i class=\"fa fa-download\" aria-hidden=\"true\"></i> </a></td>
                    </tr>
                    ";
                            }

                            mysqli_free_result($resultset);

                            mysqli_close($connection);
                            }

                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
</section>



<?php
require 'footer.php';
?>
