<?php require("first_of_all.php");?>

<div>
  <h1>Manage posts</h1>

  <table>
    <tr>
      <th>Title</th>
      <th>Date</th>
      <th>Delete</th>
    </tr>
    <?php
    //get all posts and number of comments
    $query = "SELECT * FROM article";
    $result = mysql_query($query) or die ("bad query");

    //loop through query results
    while($row = mysql_fetch_array($result)) {
      $id = $row["art_id"];
      $title = $row["art_title"];
      $date = $row["art_date"];
      //$comments = $row[""];
      ?>
      <tr>
        <td><a href ="articleedit.php?id=<?php echo $id;?>"><?php echo $title;?></a></td>
        <td><?php echo $date; ?></td>
        <form class="deleteform" action="articledb.php?function=delete&id=<?php echo $id;?>" method="POST">
        <td><button onclick="return confirm ('Are you sure you want to delete this article?');">delete</button></td>
        </form>
      </tr>
      <?php
    }
    //release query result
    mysql_free_result($result);
    ?>
  </table>
</div>
    
<?php require("last_of_all.php");?>