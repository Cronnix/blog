<?php
error_reporting(E_ALL);
ini_set( 'display_errors','1'); 
header('Content-type: text/html; charset=ISO-8859-1'); //swedish
session_start();

require("dbconnect.php");
$error = "";

//check if login form is submitted
if (isset($_GET['function']) == "login") 
{
  //get username and password from submitted form
  $unsafe_username = $_POST['user'];
  $username = mysql_real_escape_string($unsafe_username);
  $unsafe_password = $_POST['pass'];
  $password = mysql_real_escape_string($unsafe_password);

  //check if username-password combination exists in db
  $query = "SELECT user_name,user_id FROM user WHERE user_name= '$username' AND user_password= '$password'";
  $result = mysql_query($query) or die ("bad query");

//if username-password matched: set session variables to logged in
  if (mysql_num_rows($result)>0) 
	  {
	    $_SESSION['user_id'] = mysql_result($result,0,'user_id');
	    $_SESSION['user_name'] = mysql_result($result,0,'user_name');
	    $_SESSION['login'] = true;
	    $error = "Login succeeded";
	  }
  //otherwise: show error message
  else 
	  {
	    $error = "Login failed";
	  }

 mysql_free_result($result);

 if (isset($_SESSION['login'])) 
  	{
 		header('location:backend.php');
  }

}

//if logged in: go to admin index page
//if (isset($_SESSION['login'])) {
//	header("Location: backend.php");
//}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <meta charset="utf-8">
  </head>
  <body>	
    
    <div>
      <form id="loginform" name="loginform" action="?function=login" method="POST">
        <h1>Login</h1>
        <input type="text" id="username" name="user" placeholder="Username" />
        <input type="password" id="password" name="pass" placeholder="Password" />
        <input type="button" value="OK" onclick="loginform.submit();" />

        <div>
        <?php echo $error; ?>
        </div>
      </form>
    </div>

  </body>
</html>

<?php mysql_close($dbcon); ?>