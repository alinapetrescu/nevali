<?php include("phpsessionheader.php"); ?> <!-- Login and session management, at the top of the file -->
<!DOCTYPE html>
<?php include("jquery.php"); ?>
<html lang="fr">
   <head>
    <meta charset="ISO-8859-1">  
        <link rel="stylesheet" href="css/Nevali.css" />  <!-- Fichier CSS Global -->
        <link rel="stylesheet" href="login/logininfobox.css" />  <!-- Fichier CSS pour la gestion du login -->
        <link rel="stylesheet" href="css/galerie-menu.css" />  <!-- Fichier CSS home, pour un grand bandeau -->
	<link rel="stylesheet" href="css/admin.css" />  <!-- Fichier CSS home, pour un grand bandeau -->
	<link rel="stylesheet" href="css/print.css" type="text/css" media="print" />
        <link rel="shortcut icon" type="image/x-icon" href="favicon2.ico"> 
       <title>Nevali -- Search</title>
   </head>
<h1 id="homeTitle">
    <img src="logos/SearchLogo.png" alt="Search"/>
</h1>
<body>
<div id="bodydiv"><a href="home.php" id="homepage">
	<i>Back to Home Page</i>
</a>
<?php include("login/logininfobox.php"); ?> <!-- Login management, at the start of <body> -->
<br/>
<?php include("galerie-home.php"); ?> <!-- Menu bar with home pictures -->
<?php if($_SESSION['user_type']=="visitor"){
		include("visitor-bar.php");
		}
?>
	<?include("login/config.php");?>
<?php if($_SESSION['user_type']=="admin"){include("admin-bar.php");} //admin-bar integration, don't forget css ?>
<?php
$type=$_POST['type'];
$type2='';
$color=ucfirst($_POST['color']);
$maP=$_POST['Maprize'];
$miP=$_POST['Miprize'];
$size=$_POST['size'];
if($type!='Any'){
    $type2=$type;
}
if($maP=='Any'){
$maP=100000000;
}
if($miP=='Any'){
$miP=0;
}
if($size=='Any'){
$size='';
}
if($color=='Any'){
$color='';
}
  $dbhost="localhost";
  $dbuser="radovano";
  $dbpass="newpassword";
  $dbname="proj2013-radovano";
  $mysqli2 = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$result1=mysqli_query($mysqli2,"SELECT * FROM products WHERE products.Color LIKE '%$color%' AND products.Size LIKE '%$size%' AND products.Price>$miP AND products.Price<=$maP AND products.Type LIKE '%$type2%'")or die("<p>Please redo the search</p>");
echo "<div class='tables'> ";
$num_rows = mysqli_num_rows($result1);
if($num_rows!=0){
 
while($row = mysqli_fetch_array($result1))
{          
echo "<table class='tables' width='30%'><tr><td valign='top' align='center'>";
 echo '<a class="fancybox" rel="gallery1" href="data:image/jpeg;base64,'.base64_encode($row['Photo']).'">';
  echo '<img src="data:image/jpeg;base64,'.base64_encode($row['Photo']).'" width="200" height="300"
     			 title="Click to zoom in"/>';
  echo	'</a></td></tr>';
  echo "<tr><td align='center'> Colors: " . $row['Color'] . "</td></tr>";
 
  echo "<tr><td align='center'> Sizes: " . $row['Size'] . "</td></tr>";
 
  echo "<tr><td align='center'> Price: ". $row['Price'] . "</td>";
  $prodId=$row['ProductID'];
  if($_SESSION['user_type']=="user"){
	echo "<tr><td align='center'><a href = 'By.php?topic=$prodId'>Buy</a></td></tr>";
  }else{
	echo "<tr><td align='center'><a href='javascript:showLoginDialogOnly()'>Buy</a></td></tr>";	
   }
}
echo "</table>";
}else{
echo "<p style='text-align:center;margin-top:15%;margin-bottom:250px'>No such product</p>";
}
echo"</div>";
?>
</div>
</body>
</html>

<?php include("footer.php"); ?>
