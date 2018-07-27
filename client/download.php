<?php
/**
 * Created by IntelliJ IDEA.
 * User: SL_WOLF
 * Date: 2/5/2018
 * Time: 7:48 PM
 */

$connection = mysqli_connect("localhost", "root", "1234", "cloud", "3306");

$name = $_GET["file"];

header('Content-Description: File Transfer');
header('Content-Type: application/force-download');
header("Content-Disposition: attachment; filename=\"" . basename($name) . "\";");
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($name));
ob_clean();
flush();
readfile("D:\Download/".$name); //showing the path to the server where the file is to be download
exit;