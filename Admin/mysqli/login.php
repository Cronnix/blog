<?php
error_reporting(E_ALL);
ini_set( 'display_errors','1'); 
header('Content-type: text/html; charset=ISO-8859-1'); //swedish
session_start();

require("dbconnect.php");
$error = "";

//check if login form is submitted
if (isset($_POST['function']) == "login") 
{
  //get username and password from submitted form
  $username = $_POST['user'];
  $password = $_POST['pass'];

  //check if username-password combination exists in db
  $query = "SELECT user_id, user_name FROM user WHERE user_name= '$username' AND user_password= '$password'";
  $result = mysqli_query($db, $query) or die ("bad query");

//if username-password matched: set session variables to logged in
  if (mysqli_num_rows($result)>0) 
	  {
	    $_SESSION['user_id'] = mysqli_result($result,0, "user_id");
	    $_SESSION['user_name'] = mysqli_result($result,0, "user_name");
	    $_SESSION['login'] = true;
	    $error = "Login succeeded";
	  }
  //otherwise: show error message
  else 
	  {
	    $error = "Login failed";
	  }

 mysqli_free_result($result);

 if (isset($_SESSION['login'])) 
  	{
 		header("Location: login.php");
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
      <form id="loginform" name="loginform" action="login.php" method="POST">
        <h1>Login</h1>
        <input type="text" id="username" name="user" placeholder="Username" />
        <input type="password" id="password" name="pass" placeholder="Password" />
        <input type="hidden" name="function" value="login">
        <input type="button" value="OK" onclick="loginform.submit();" />

        <div>
        <?php echo $error; ?>
        </div>
      </form>
    </div>

  </body>
</html>

<?php mysqli_close($db); ?>