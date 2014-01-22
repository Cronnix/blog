<?php
session_start(); //enable the use of $_SESSION variables

//reset sessions variables
unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
unset($_SESSION['login']);

//go to login page
header('Location: login.php');

?>