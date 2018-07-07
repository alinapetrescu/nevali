<?php 
if($_SESSION['user_type']=="admin"){
	if(isset($_POST['CreateNews'])){
		$Title = $_POST['title'];
		$myNews = $_POST['newscontent'];
		$Date= date("d.m.Y");
		//ouvrir base de données
 		include("login/config.php"); // <!-- open database, do not forget to mysqli_close($mysqli); when done with -->
		$queryCreateNews = "INSERT 
												INTO news 
												(Date, Title, Content) 
												VALUES ('".$Date."', '".$Title."', '".$myNews."');";
		$resultCreateNews = mysqli_query($mysqli, $queryCreateNews);

		mysqli_close($mysqli);
	}	
	
	if($_SESSION['user_type']=="admin" && isset($_POST['deleteNews'])){
		include("login/config.php");
		$queryDeleteNews = "DELETE FROM news WHERE Title='".$_POST['TitleNewsDelete']."'";
		$resultDeleteNews = mysqli_query($mysqli, $queryDeleteNews);
		mysqli_close($mysqli);
	}
}
?>
