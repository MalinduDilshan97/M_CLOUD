<?php
/**
 * Created by IntelliJ IDEA.
 * User: SL_WOLF
 * Date: 2/4/2018
 * Time: 4:53 PM
 */

$connection=mysqli_connect("localhost", "root","1234", "cloud", "3306");
if (!$connection){
    echo mysqi_connect_error();
}else{
$resultset = mysqli_query($connection, "select userSpace from users WHERE email='$email'");

?>

<section class="invoice">
            <div class="info-box bg-green-gradient">-->
                <span class="info-box-icon"><i class="fa fa-pie-chart"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Used Storage</span>
                    <span class="info-box-number">41,410</span>
                    <!-- The progress section is optional -->
                    <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">
                        <?php echo $resultset ?>
                    </span>
                </div>
            </div>

            <?php

            mysqli_free_result($resultset);

            mysqli_close($connection);
            }

            ?>

</section>


<!--<section class="invoice">-->
<!---->
<!--    <div class="info-box bg-green-gradient">-->
<!--            <span class="info-box-icon"><i class="fa fa-pie-chart"></i></span>-->
<!--            <div class="info-box-content">-->
<!--              <span class="info-box-text">Used Storage</span>-->
<!--              <span class="info-box-number">41,410</span>-->
<!--              <!-- The progress section is optional -->-->
<!--              <div class="progress">-->
<!--                <div class="progress-bar" style="width: 70%"></div>-->
<!--              </div>-->
<!--              <span class="progress-description">-->
<!--                    --><?php //$result ?>
<!--              </span>-->
<!--            </div><!-- /.info-box-content -->-->
<!--    </div><!-- /.info-box -->-->
<!--    -->
<!--</section>-->