<?php
header('Content-type: text/html; charset=ISO-8859-1');

// hämta filnamn
$path = pathinfo($_SERVER['PHP_SELF']);
$file = $path['filename'];

$db_username="";
$db_password="";
$database="";
$host="";

//mysql_connect($host, $db_username, $db_password);
//@mysql_select_db($database) or die ("Kan inte ansluta till databasen, försök igen senare.");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Anton Pustovoyt</title>
	<meta charset="utf-8"> 
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="fontsheet.css" type="text/css" charset="utf-8" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>

<body>

<div id="wrapper">
	<div id="leftwrapper">
		<div id="logodiv">
			<img id="photo" src="images/anton.png" alt="photo of me">
			<a href="blog.php"><img id="logo" src="images/logo.png" alt="logotype"></a>
			<!--
			<p class="logobig">ANTON</p>
			<p class="logobig">PUSTOVOYT</p>
			<p class="logosmall">web developer</p>
			<p class="logosmall">designer</p>//-->
		</div>

		<nav id="menudiv">
		<ul id="menu">
			<li class="<?php if($file=="blog"){echo "active";} else {echo "nonactive";}?>"><a href="blog.php" >blog</a></li>
			<li class="<?php if($file=="portfolio"){echo "active";} else {echo "nonactive";}?>"><a href="portfolio.php">portfolio</a></li>
			<li class="<?php if($file=="about"){echo "active";} else {echo "nonactive";}?>"><a href="about.php">about</a></li>
			<li class="<?php if($file=="contact"){echo "active";} else {echo "nonactive";}?>"><a href="contact.php">contact</a></li>
		</ul>
		</nav>

		<div id="menucon">
			<div id="searchfield">
				<input type="text" name="FirstName" placeholder="Search.." id="search">
				<!--
				<a href="search.php"><img src="images/search.png" id="searchpic" alt="search"></a>
				//-->
			</div>
			<p id="tagcloudp">categories:</p>
			<ul id="tagcloud">
			<li><a href="design.html">webdev</a></li>
			<li><a href="design.html">design</a></li>
			<li><a href="design.html">misc</a></li>
			</ul>
		</div>

		<div id="menulinks">
			<a href="http://www.twitter.com"><img id="twitter" src="images/twitter.png" alt="twitter"></a>
			<a href="http://www.linkedin.com"><img id="linkedin" src="images/linkedin.png" alt="linkedin"></a>
		</div>

		<div id="menufoot">
			<p id="copyright">&#169; Anton Pustovoyt 2013</p>
		</div>
	</div>