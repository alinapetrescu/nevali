<?php include("login/config.php"); ?> <!-- open database, do not forget to mysqli_close($mysqli); when done with -->
<?php
$table=comment;
$result1 = mysqli_query($mysqli,"SELECT * FROM comment");
while($row = mysqli_fetch_array($result1))
  {

  $name=$row['name'];
  $comment=$row['comment'];
  echo'<div class="divComment">';
  		if($_SESSION['user_type']=="admin"){
			echo '<form method="POST" style="display: inline-block;">
				<input type="hidden" name="nameCommentDelete" value="'.$name.'">
				<input type="hidden" name="contentCommentDelete" value="'.$comment.'">
				<input type="submit" name="deleteComment" value="Delete">
			</form>';
			}
		echo '<h3 style="margin-top:2%;" class="nameComment">'.$name.'</h3>
		<p id="pnews" class="contentComment" >'.$comment.'</p>
	 </div>';
  }
mysqli_close($mysqli);
?>
