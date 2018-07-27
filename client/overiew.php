<?php
/**
 * Created by IntelliJ IDEA.
 * User: SL_WOLF
 * Date: 1/23/2018
 * Time: 6:03 PM
 */

require "header.php";

$connection=mysqli_connect("localhost", "root","1234", "cloud", "3306");
if (!$connection){
    echo mysqi_connect_error();
}else{
    $count=0;
    $used=0;
    $fileCount=0;
    $resultset = mysqli_query($connection, "select * from users");
    $resultsets = mysqli_query($connection, "select * from upload");

    while ($rowData = mysqli_fetch_row($resultset)) {
        $count++;
    }

    while ($rowData = mysqli_fetch_row($resultsets)) {
        $fileCount++;
        $fileSize=$rowData[3];
        $used=$used+$fileSize;
    }

    mysqli_free_result($resultset);

    mysqli_close($connection);
}

$used=$used/1024;
$used=$used/1024;
$used=$used/1024;

?>


<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div>
                <img height="130px" width="250px" src="images/speedtest.gif">
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo $fileCount?><sup style="font-size: 20px"></sup></h3>

                    <p>File Uploads</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo $count ?></h3>

                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php echo round($used)?> &nbsp;&nbsp; GB</h3>

                    <p>Storage Uses</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <!-- Slideshow container -->
            <div class="slideshow-container">

                <!-- Full-width images with number and caption text -->
                <div class="mySlides fade">
                    <div class="numbertext">1 / 5</div>
                    <img src="images/slid1.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2 / 5</div>
                    <img src="images/Slid2.png" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">3 / 5</div>
                    <img src="images/slid3.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">4 / 5</div>
                    <img src="images/server1.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">4 / 5</div>
                    <img src="images/smtp-server.jpg" style="width:100%">
                </div>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>

            <!-- The dots/circles -->
            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>

        </div>
    </div>
    <?php
    require "footer.php";
    ?>
