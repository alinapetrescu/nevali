<?php include("login/config.php"); ?> <!-- open database, do not forget to mysqli_close($mysqli); when done with -->
<?php
$table=news;
$result1 = mysqli_query($mysqli,"SELECT * FROM news");
while($row = mysqli_fetch_array($result1))
  {
  $date=$row['Date'];
  $title=$row['Title'];
  $news=$row['Content'];
  echo'<h3 style="margin-top:2%;">'.$date.'   '.$title.'</h3>';
		if(isset($_POST['Delete'])){
			echo '<form method="POST" style="display: inline-block;">
				<input type="hidden" name="TitleNewsDelete" value="'.$title.'">
				<input type="submit" name="deleteNews" value="Delete">
			</form>';
		}
	echo '<p id="pnews" class="news" >'.$news.'</p>';
  }
mysqli_close($mysqli);
?>
