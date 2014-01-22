<?php require("first_of_all.php");?>

<?php
$id = $_GET["id"];
$success = $_GET["success"];
$error = $_GET["error"];
$query = "SELECT * FROM article WHERE art_id = '$id'";
$result = mysql_query($query) or die("Bad query");

if (mysql_num_rows($result)>0) 
  {
    $current_cat = mysql_result($result,0,'cat_id');
    $title= mysql_result($result,0,'art_title');
    $text= mysql_result($result,0,'art_text');
    $show= mysql_result($result,0,'art_show');
    echo $current_cat;
  }

else {
  $error = "Post not found";
}
mysql_free_result($result);

?>    

<div>
  <form id="articleform" name="articleform" action="articledb.php?function=update&id=<?php echo $id;?>" method="POST">
    <h1>Edit post</h1>

    <input type="text" id="title" name="title" placeholder="Title" value="<?php echo $title?>"/>

    <select id="category" name="category">
      <option value="">Choose category</option>
      <?php
      //get categories from db
      $query = "SELECT * FROM category";
      $result = mysql_query($query) or die ("bad query");


      //loop through query results and add <option> for each row
        while($row = mysql_fetch_array($result)) {
        $catid = $row["cat_id"];
        $catname = $row["cat_name"];

        if ($catid==$current_cat){
          echo "<option selected value=$catid>$catname</option>";
        }
        else {
          echo "<option value=$catid>$catname</option>";
        }
      }

      //free query result
       mysql_free_result($result);
      ?>
    </select>

    <textarea id="text" name="text" placeholder="Text"><?php echo $text?></textarea> 

    <?php
    if ($show==1){
      echo '<input type="checkbox" id="show" name="show" checked="true"><label for="show">Show in news feed</label>';
    }
    else {
      echo '<input type="checkbox" id="show" name="show"><label for="show">Show in news feed</label>';
    }
    ?>
    <input type="button" value="UPDATE" onclick="articleform.submit();" />

    <div><?php echo $error; ?></div>
    <div><?php echo $success; ?></div>
  </form>
</div>
    
<?php require("last_of_all.php");?>