<?php
session_start(); //enable the use of $_SESSION variables

//if not logged in: go to login page
if (!isset($_SESSION['login'])) {
  header('Location: login.php');
}

//include db connection file
require("dbconnect.php");

//get input parameters from query string
$function = $_GET['function'];
$id = $_GET['id'];
$title = $_POST['title'];
$category = $_POST['category'];
$text = $_POST['text'];
$show = strlen($_POST['show']) > 0 ? 1 : 0; //if show is checked (on) set to 1, else 0

//insert post
if ($function == "insert") {
  //add post to db
  $insert_query = "INSERT INTO article (cat_id, art_title, art_text, art_show, art_date) VALUES ($category, '$title', '$text', $show, now())";
	mysql_query($insert_query) or die (mysql_error());
  
  //get inserted post id
  $id = mysql_insert_id();
    
  //set success message
  $success = "Post successful";
  
  //go to edit page and show success message
  header("location:articlenew.php?id=$id&success=$success");
}

//update post
else if ($function == "update") {
   $edit_query = "UPDATE article SET art_title='$title', cat_id='$category', art_text='$text', art_show='$show' WHERE art_id='$id'";
   mysql_query($edit_query) or die (mysql_error());
   $success = "Edit successful";

   header("location:articlenew.php?id=$id&success=$success");
}

//delete post
else if ($function == "delete") {
  //delete post from db
  $delete_query = "DELETE FROM article WHERE art_id = $id";
  mysql_query($delete_query) or die (mysql_error());
  
  //go to post list
  header("location:articlelist.php");
}
?>