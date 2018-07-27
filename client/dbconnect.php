<?php
/**
 * Created by IntelliJ IDEA.
 * User: SL_WOLF
 * Date: 2/2/2018
 * Time: 12:02 PM
 */

// this will avoid mysql_connect() deprecation error.
error_reporting( ~E_DEPRECATED & ~E_NOTICE );
// but I strongly suggest you to use PDO or MySQLi.

define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '1234');
define('DBNAME', 'cloud');

$conn = mysql_connect(DBHOST,DBUSER,DBPASS);
$dbcon = mysql_select_db(DBNAME);

if ( !$conn ) {
    die("Connection failed : " . mysql_error());
}

if ( !$dbcon ) {
    die("Database Connection failed : " . mysql_error());
}