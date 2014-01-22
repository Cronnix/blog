<?php
$db_username="root";
$db_password="bjork";
$database="blog";
$host="localhost";

$dbcon = mysql_connect($host, $db_username, $db_password);
mysql_select_db($database, $dbcon) or die ("failed");
?>