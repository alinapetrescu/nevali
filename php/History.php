<?php include("phpsessionheader.php"); ?> <!-- Login and session management, at the top of the file -->
<!DOCTYPE html>
<?php include("jquery.php"); ?>
 <script>
function goBack()
  {
  window.history.back()
  }
</script>
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


<div id="go back" style="margin-top: 12px;"><form action="UserMan.php" method="POST"><input type="submit" value="Go back"></div>

<?php
$dbhost="localhost";
  $dbuser="radovano";
  $dbpass="newpassword";
  $dbname="proj2013-radovano";
  $mysqli2 = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$name=$_GET['user'];
$hist=mysqli_query($mysqli2,"SELECT * FROM History WHERE userName='$name'")or die("<p>Something went wrong, please refresh the page</p>");
while($hi = mysqli_fetch_array($hist)){
echo "<table class='tables'>";
 $pro=$hi['ProductID'];
  $prod=mysqli_query($mysqli2,"SELECT * FROM products WHERE ProductID=$pro")or die("<p>Something went wrong, please refresh the page</p>");
  while($p = mysqli_fetch_array($prod)){
  echo "<tr><td valign='top' align='center'>";
	echo '<a class="fancybox" rel="gallery1" href="data:image/jpeg;base64,'.base64_encode($p['Photo']).'">';
  echo '<img src="data:image/jpeg;base64,'.base64_encode($p['Photo']).'" width="200" height="300"
     			 title="Click to zoom in"/>';
  echo	'</a></td></tr>';
  
  echo "<tr><td align='center'> Product ID: " . $hi['ProductID'] . "</td></tr>";
  
  echo "<tr><td align='center'> Color: " . $hi['Color'] . "</td></tr>";
  
  echo "<tr><td align='center'> Size: ". $hi['Size'] . "</td></tr>";
echo "<tr><td align='center'> Price: ". $p['Price'] . "</td></tr>";   
}
echo "</table>";
}
?>

</div>
</body>
</html>

<?php include("footer.php"); ?>
