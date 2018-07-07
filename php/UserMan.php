<?php include("phpsessionheader.php"); ?> <!-- Login and session management, at the top of the file -->
<!DOCTYPE html>
<?php include("jquery.php"); ?>
<html lang="fr">
   <head>
	<meta charset="ISO-8859-1">
				<link rel="stylesheet" href="css/Nevali.css" />  <!-- Fichier CSS Global -->
        <link rel="stylesheet" href="login/logininfobox.css" />  <!-- Fichier CSS pour la gestion du login -->
        <link rel="stylesheet" href="css/galerie-menu.css" />  <!-- Fichier CSS -->
				<link rel="stylesheet" href="css/print.css" type="text/css" media="print" />
        <link rel="shortcut icon" type="image/x-icon" href="favicon2.ico"> 
        <?php if($_SESSION['user_type']=="admin"){
						echo'<link rel="stylesheet" href="css/admin.css" />  <!-- Fichier CSS specifique admins -->';}
				?>
       <title>Nevali -- User Management </title>
   </head>
<h1 id="homeTitle">
    <img src="logos/UserMan.png" alt="User Management"/>
</h1>
<body><div id="bodydiv"><a href="home.php" id="homepage">
	<i>Back to Home Page</i>
</a>
<?php include("login/logininfobox.php"); ?> <!-- Login management, at the start of <body> -->
<br/>
<?php include("galerie-home.php"); ?> <!-- Menu bar with home pictures -->
<?php
$page="UserManagement";
if($_SESSION['user_type']=="admin"){include("admin-bar.php");} //admin-bar integration, don't forget css 
?>
<?php if($_SESSION['user_type']=="visitor"){
		include("visitor-bar.php");
		}
?>



<?php
////////////////////////////////////////////////
// Creation et affichage de la table des clients
////////////////////////////////////////////////
include("login/config.php");
$result1=mysqli_query($mysqli,"SELECT * FROM users")or die("<p>Something went wrong, please refresh the page</p>");
$num_rows = mysqli_num_rows($result1);
if($num_rows!=0){
	while($row = mysqli_fetch_array($result1))
			{   
			$name=$row['Username'];
			$hist=mysqli_query($mysqli,"SELECT * FROM History WHERE userName='$name'")or die("<p>Something went wrong, please refresh the page</p>");
	 		//$number=0;
	 		//while($num = mysqli_fetch_array($hist)){$number=$number+1;}
	 		$numberBuyings=mysqli_num_rows($hist);
	 		if(isset($_POST['Edit'])){
	 		include("ClientEdit.php");
	 		}
		 		else{	      
				echo "<table frame='box' align='center' class='tables' class='tableUserForAdmin'>";
						echo "<tr><td align='center'> User ID: </td>		<td>" . $row['UserID'] . "</td></tr>";
						echo "<tr><td align='center'> First name: </td>	<td>" . $row['Firstname'] . "</td></tr>";
						echo "<tr><td align='center'> Last name: </td>	<td>". $row['Lastname'] . "</td></tr>";
				 		echo "<tr><td align='center'> Username: </td>		<td>". $row['Username'] . "</td></tr>";
						echo "<tr><td align='center'> Password: </td>		<td>". $row['Password'] . "</td></tr>";
				 		echo "<tr><td align='center'>Purchased products: </td><td>".$numberBuyings. "</td></tr>";
				 if($numberBuyings!=0){
							 echo "<tr><td colspan='2' align='center'><form action='History.php?user=$name' method='POST'><input type='submit' value='See history of buyings' name='History'></form></td></tr>";
				 }	
					else{
						echo "<tr><td colspan='2' align='center' style='color:black'><button style='visibility:hidden;'/>'</td></tr>";
					}
					if($_SESSION["user_type"]=="admin" && isset($_POST["Delete"]))
					{echo'
							<tr><td colspan="2" align="center"> 
									<form method="POST">
											<input type="hidden" name="DeleteClientID" value="'.$row['UserID'].'" required/>
								 			<input type="submit" name="DeleteClientOrder" value="Delete" style="margin: 0 auto;"/>
									</form>
							</td></tr>'
						;
					}
				echo "</table>";
			}
			}
}
else{
	echo "<p style='text-align:center;margin-top:15%;margin-bottom:250px'>There is no registered user</p>";
}
?>
<?php
if(isset($_POST['History'])){
?>
<script>
  var continue_button = document.getElementById('history');
  continue_button.style.visibility = 'visible'; 
</script>
<?php
}
?>

</div>
</body>
</html>

<?php include("footer.php"); ?>
