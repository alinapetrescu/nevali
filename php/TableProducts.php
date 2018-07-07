<?php include("login/config.php"); ?> <!-- open database, do not forget to mysqli_close($mysqli); when done with -->
<?php
$result1 = mysqli_query($mysqli,"SELECT * FROM products WHERE products.Type='".$producttype."'");
echo "<div id='divtables' class='tables'> ";
while($row = mysqli_fetch_array($result1))
  {
	$prodId=$row['ProductID'];
  if(isset($_POST['Edit'])){	
		echo "<table class='tables'>";
			include("PictureProductEdit.php"); //edit formular type picture show
			include("ButtonDelete.php");//inside php, will check admin priviledges and Delete mode
		echo "</table>";}
	elseif($row['IsVisible']!="0"){
		echo "<table class='tables'>";
			include("PictureProduct.php"); //normal type picture show
			if($_SESSION['user_type']=="user"){
				echo "<tr><td align='center'><a href = 'By.php?topic=$prodId'>Buy</a></td></tr>";
			}//Buy options for clients (logged with user priviledges)
			if($_SESSION['user_type']=="visitor"){
				echo "<tr><td align='center'><a href ='javascript:showLoginDialogOnly();'>Buy</a></td></tr>";
			}//Redirrect for visitors toward Login (or register)
			include("ButtonDelete.php");//inside php, will check admin priviledges and Delete mode
		echo "</table>";}
//else do not create any <table/>
	}//end while loop
echo "</div>";
		mysqli_close($mysqli);
?>
