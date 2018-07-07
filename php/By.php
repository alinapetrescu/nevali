<?php include("phpsessionheader.php"); ?> <!-- Login and session management, at the top of the file -->
<!DOCTYPE html>
<?php include("jquery.php"); ?>
<html lang="fr">
   <head>
	<meta charset="ISO-8859-1">   
        <link rel="stylesheet" href="css/Nevali.css" />  <!-- Fichier CSS Global -->
        <link rel="stylesheet" href="login/logininfobox.css" />  <!-- Fichier CSS pour la gestion du login -->
        <link rel="stylesheet" href="css/galerie-menu.css" />  <!-- Fichier CSS home, pour un grand bandeau -->
				<link rel="stylesheet" href="print.css" type="text/css" media="print" />
        <link rel="shortcut icon" type="image/x-icon" href="favicon2.ico"> 
       <title>Nevali -- Buyings</title>
   </head>
<h1 id="homeTitle">
    <img src="logos/BuyingsLogo.png" alt="Buyings"/>
</h1>
<body>
<div id="bodydiv">
<?php include("login/logininfobox.php"); ?> <!-- Login management, at the start of <body> -->
<a href="home.php" id="homepage">
		<i>Back to Home Page</i>
</a>
<br/>
<?php include("galerie-home.php"); ?> <!-- Menu bar with home pictures -->
<br/>
<?php include("login/config.php"); ?> <!-- open database, do not forget to mysqli_close($mysqli); when done with -->
<?php
$a=$_GET['topic']; 
$result1 = mysqli_query($mysqli,"SELECT * FROM products WHERE products.ProductID='$a'");
while($row = mysqli_fetch_array($result1))
  { 
$name=$row['Type'];    
echo "<table width='50%' style='margin-left:10%'>";
 echo "<tr><td valign='top' align='center'>"
     . '<img src="data:image/jpeg;base64,' . base64_encode($row['Photo']) . '" width="350" height="500">'
     . '</td>';
$result2 = mysqli_query($mysqli,"SELECT Color FROM products WHERE products.ProductID='$a'");
$result3 = mysqli_query($mysqli,"SELECT Size FROM products WHERE products.ProductID='$a'");
mysqli_close($mysqli);
while($row = mysqli_fetch_array($result2))
  {
	$colors=$row[0];
}
$color=explode(",",$colors);
echo "<td valign='top'><form action='ByAction.php?back=$back&prod=$a' method ='POST'>Select color: <select name='selCol'>";
foreach($color as &$value){
echo "<option value='$value'>$value</option>";
}
echo"</select>";
while($row = mysqli_fetch_array($result3))
  {
	$sizes=$row[0];
}
$size=explode(" ",$sizes);

echo "</br></br>Select size: <select name='selSize'>";
foreach($size as &$value){
echo "<option value='$value'>$value</option>";
}
echo"</select>";

if($name=='Dress'){
echo "</br> </br> </br><input type='submit' name='putBasket' value='Put it to my basket'></br> </br></form><form action='Dresses.php' method='POST'><input type='submit' name='goback' value='Go back'></form></td>";}
if($name=='Shoes'){
echo "</br> </br> </br><input type='submit' name='putBasket' value='Put it to my basket'></br> </br></form><form action='Shoes.php' method='POST'><input type='submit' name='goback' value='Go back'></form></td>";
}
if($name=='Accessorize'){
echo "</br> </br> </br><input type='submit' name='putBasket' value='Put it to my basket'></br> </br></form><form action='Accessorize.php' method='POST'><input type='submit' name='goback' value='Go back'></form></td>";
}
  }

?>
</table>
</div>
</body>
<?php include("footer.php"); ?>
</html>
