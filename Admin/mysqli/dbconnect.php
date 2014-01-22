<?php
$db_username="root";
$db_password="bjork";
$database="blog";
$host="localhost";

$db = mysqli_connect($host, $db_username, $db_password);
mysqli_select_db($db, $database, $db) or die ("failed");
?>
