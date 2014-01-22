<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
<title> inlägg och kommentarer </title>
    <meta charset="utf-8">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="admin.js"></script>
     <script type="text/javascript">

     $(document).ready(function(){
     	$('.commentSec').slideToggle();
        $('.showButt').click(function(){

          $(this).parent().find(".commentSec").slideToggle(200);
          
        });
      });
  
  	$(function() {
  		$('.comment-form').each(function(){
		    $(this).validate({
		    
		        // Specify the validation rules
		        rules: {
		            name: "required",
		            comment: "required",
		                email: {
		                required: true,
		                email: true
		            },
		        },
		        
		        // Specify the validation error messages
		        messages: {
		            name: "Please enter your first name",
		            comment: "Please enter your comment",
		            email: "Please enter a valid email address",
		        },
		        
		        submitHandler: function(form) {
		            form.submit();
		        }
	    	});
		});
	});
  
  </script>
</head>
<body>
<?php
		//Inkludera dbconnect.php
	require("dbconnect.php");


					//Fyll i rätt värden, kolla i formuläret längre ner
					$function = $_GET["function"];
					$artid = $_GET["id"];

					$unsafe_author=$_POST["name"];
					$author = mysql_real_escape_string($unsafe_author);

					$unsafe_email = $_POST["email"];
					$email = mysql_real_escape_string($unsafe_email);

					$unsafe_text = $_POST["comment"];
					$text = mysql_real_escape_string($unsafe_text);
	
	if ($function == "comment")
				{
					//Skriv in en query för att lägga till en kommentar i din table för comments
					//Kommentaren ska innehålla artikel id, vem som skrivit den,
					//Personens email samt en text(kommentaren)
					// Fälten ska fyllas med ovanstående variabler
					$insert_query = "INSERT INTO comment (art_id, com_date, author_name, author_mail, com_text) VALUES ($artid, now(), '$author', '$email', '$text')";
					mysql_query($insert_query) or die (mysql_error());

				}

				//Skriv en query som hämtar ALLA dina inlägg från databasen
	$result = mysql_query("SELECT * FROM article ORDER BY art_date DESC;");

	while($row = mysql_fetch_array($result))
			{
				//Lägg till rätt databas-kolumner i alla $row
					$id = $row['art_id'];
					$cat = $row['cat_id'];

					$comAmountQ = mysql_query("SELECT COUNT(*) FROM comment WHERE art_id=$id");
					$comAmount = mysql_fetch_assoc($comAmountQ);
					$artCategory = mysql_query("SELECT cat_name FROM category WHERE cat_id=$cat") or die ("Bad query");
					$current_cat_print = mysql_result($artCategory,0,'cat_name');
					?>
					
					<article class = "bpost">
						<div class = "postpicdiv">
							<img src="images/pic1.jpg" alt="misty highlands" class="postpic">
						</div>

						<section class = "postsec">
							<header class =" bheader">
								<h1 class="posthead"><?php echo $row['art_title'];?></h1>
								<time class="postdate">on <?php echo $row['art_date'];?>, in <?php echo $current_cat_print;?></time><br>
							</header>

							<p class = "postcontent">
							<?php echo $row['art_text'];?>
							</p>
						</section>

					<div class="commentsWrap">
						<button type="button" class="showButt" onclick=show();>Comments (<?php echo $comAmount['COUNT(*)'];?>)</button>
							<div class="commentSec">
								<p>Post a comment:</p>
								<form name='input' action='?function=comment&id=<?php echo $id;?>' method='post' class='comment-form'>
									<input type='text' name='name' placeholder='Name' class='name'><br>
									<input type='text' name='email' placeholder='Email' class='email'><br>
									<input type='text' name='comment' placeholder='Comment' class='comment'><br>
									<input type='submit' value='Submit'>
								</form>

					<?php
		
					//Skapa en query som hämtar alla kommentarer där artikel id är detsamma,
					$com_query= "SELECT * FROM comment WHERE art_id=$id";
					//titta ett par rader upp för att veta vilken variabel du ska använda
					$result2 = mysql_query($com_query);
					
					while($row = mysql_fetch_array($result2))
					{
					//Fyll i while-loopen så att den skriver ut kommentarer
						$comdate = $row["com_date"];
					    $comauthor = $row["author_name"];
					    $comtext = $row["com_text"];
					    ?>
					    <p>On <?php echo $comdate . " " .$comauthor;?> said:</p>
					    <p><?php echo $comtext; echo "<br>";?></p>
					    <?php
					}
					echo "</div>";
					echo "</div>";
					echo "</article>";
			}					
 ?>