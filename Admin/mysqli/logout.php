<?php
session_start(); //enable the use of $_SESSION variables

//reset sessions variables
unset($login);
unset($user_id);
unset($user_name);

//go to login page
header("Location: login.php");

?>