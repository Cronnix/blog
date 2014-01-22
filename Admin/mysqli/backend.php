<?php
header('Content-type: text/html; charset=ISO-8859-1'); //swedish
session_start(); //enable the use of $_SESSION variables

//if not logged in: go to login page
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
}

//include db connection file
require("dbconnect.php");

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Administration</title>
    <meta charset="utf-8">
  </head>
  <body>
    
    <div>
      Logged in as <?php echo isset($_SESSION['user_name']); ?>
      <a href="logout.php">Log out</a>
    </div>
    
    <div>
      <a href="backend.php">Admin</a>
    </div>
    
    <!-- page specific content START -->
    
    <div>
      <h1>Administration</h1>
      
      Du ar inloggad. Bra jobbat! Testa logga ut och logga in igen.
      <br>
      <a href="">New post</a>
      <br>
      <a href="">Manage posts</a>
      
    </div>
    
    <!-- page specific content END -->
    
  </body>
</html>

<?php
//close connection to db
mysql_close();
?>

