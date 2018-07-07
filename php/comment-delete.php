<?php 
if($_SESSION['user_type']=="admin"){
	if(isset($_POST['deleteComment'])){
		include("login/config.php"); // <!-- open database, do not forget to mysqli_close($mysqli); when done with -->
	
		$namecomment=$_POST['nameCommentDelete'];//rename variable without quotes
		$contentcomment=$_POST['contentCommentDelete'];//rename variable without quotes
		
		$queryDeleteComment = "DELETE FROM comment WHERE name='$namecomment' AND comment='$contentcomment'";
		$resultDeleteComment = mysqli_query($mysqli, $queryDeleteComment);
	
		if(!$resultDeleteComment){echo "Could not connect to database (Delete Comment)";}
	
		mysqli_close($mysqli);
	}
}
?>
