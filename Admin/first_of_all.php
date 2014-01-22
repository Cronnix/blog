<?php
header('Content-type: text/html; charset=ISO-8859-1'); //swedish
session_start(); //enable the use of $_SESSION variables

//if not logged in: go to login page
if (!isset($_SESSION['login'])) {
  header('Location: login.php');
}

//include db connection file
require("dbconnect.php");

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Administration</title>
    <meta charset="utf-8">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="admin.js"></script>
  </head>
  <body>
    
    <div>
      Logged in as <?php 
      echo $_SESSION['user_name']; ?>
      <a href="logout.php">Log out</a>
    </div>
    
    <div>
      <a href="backend.php">Admin</a>
    </div>