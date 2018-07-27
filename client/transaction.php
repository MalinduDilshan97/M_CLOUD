<?php
/**
 * Created by IntelliJ IDEA.
 * User: SL_WOLF
 * Date: 2/4/2018
 * Time: 8:34 PM
 */
require 'header.php';

$connection=mysqli_connect("localhost", "root","1234", "cloud", "3306");
if (!$connection){
    echo mysqi_connect_error();
}else{

$resultset = mysqli_query($connection, "select * from Payment WHERE email='$email'");
?>

<section class="invoice">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <br>

            <div class="row box-pane">
                <div class="col-sm-12">
                    <table class="table" id="tableN">
                        <thead style="background-color: #001F3F;color: white">
                        <tr>
                            <th>Payment ID</th>
                            <th>Card Holder Name</th>
                            <th>Card Number</th>
                            <th>Transaction Date</th>
                            <th>Transaction Amount<small>&nbsp;&nbsp;(USD)</small></th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($rowData = mysqli_fetch_row($resultset)) {
                            echo "<tr>
                            <td class='pId'>$rowData[0]</td>
                            <td class='name'>$rowData[1]</td>
                             <td class='card'>$rowData[2]</td>
                              <td class='date'>$rowData[3]</td>
                              <td class='price'>$rowData[4]</td>
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
