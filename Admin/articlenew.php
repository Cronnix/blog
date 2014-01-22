<?php require("first_of_all.php");?>

<?php
$success = $_GET['success'];
$error = $_GET['error'];
?>
    
<div>
  <form id="articleform" name="articleform" action="articledb.php?function=insert" method="POST">
    <h1>New post</h1>

    <input type="text" id="title" name="title" placeholder="Title" />

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
        echo "<option value=$catid>$catname</option>";
      }

      //free query result
       mysql_free_result($result);
      ?>
    </select>

    <textarea id="text" name="text" placeholder="Text"></textarea> 

    <input type="checkbox" id="show" name="show"><label for="show">Show in news feed</label>

    <input type="button" value="SAVE" onclick="articleform.submit();" />

    <div><?php echo $error; ?></div>
    <div><?php echo $success; ?></div>
  </form>
</div>
    
<?php require("last_of_all.php");?>