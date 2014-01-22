<?php require("first_of_all.php");
          $comAmountBQ = mysql_query("SELECT COUNT(*) FROM comment");
          $comAmountB = mysql_fetch_assoc($comAmountBQ);

          $postsAmountQ = mysql_query("SELECT COUNT(*) FROM article");
          $postsAmount = mysql_fetch_assoc($postsAmountQ);

?>
    <!-- page specific content START -->

    
    <div>
      <h1>Administration</h1>
      
      Du ar inloggad. GOOD JAWB!! FEEL THE POWER!.
      <br>
      <p> Statistik-<br>
          Posts: <?php echo $comAmountB['COUNT(*)'];?><br>
          Comments: <?php echo $postsAmount['COUNT(*)'];?></p>
      <a href="articlenew.php">New post</a>
      <br>
      <a href="articlelist.php">Manage posts</a>
      
    </div>
    
    <!-- page specific content END -->
<?php require("last_of_all.php");?>