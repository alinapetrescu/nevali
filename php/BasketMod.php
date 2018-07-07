<?php include("phpsessionheader.php");?> <!-- Login and session management, at the top of the file -->
<!DOCTYPE html>
<?php include("jquery.php"); ?>
<html lang="fr">
   <head>
	<meta charset="ISO-8859-1">   
        <link rel="stylesheet" href="css/Nevali.css" />  <!-- Fichier CSS Global -->
        <link rel="stylesheet" href="login/logininfobox.css" />  <!-- Fichier CSS pour la gestion du login -->
        <link rel="stylesheet" href="css/galerie-menu.css" />  <!-- Fichier CSS home, pour un grand bandeau -->
        <link rel="shortcut icon" type="image/x-icon" href="favicon2.ico"> 
       <title>Nevali -- Basket</title>
   </head>
<h1 id="homeTitle">
    <img src="logos/BasketLogo.png" alt="Basket"/>
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
</body>
</html>
<?php
$user=$_GET["user"];
$id=$_GET['id'];
$sum=0;
$bigId=0;
$getId=mysqli_query($mysqli,"SELECT CommandID FROM Command WHERE userName='$user' AND ProductID=$id");
while($row=mysqli_fetch_array($getId)){
	if($row['CommandID']>$bigId){
		$bigId=$row['CommandID'];	
	}
}
$result3 = mysqli_query($mysqli,"DELETE FROM Command WHERE userName='$user' AND ProductID=$id AND CommandID=$bigId");
echo "<table width='50%' style='margin-left:10%'>";
$result1 = mysqli_query($mysqli,"SELECT `Type`,Command.`Color`,Command.`Size`,`Price`,`Photo`FROM products,Command,users WHERE products.ProductID=Command.ProductID AND users.UserName=Command.userName AND users.username='$user'");
while($row = mysqli_fetch_array($result1))
  {$sum=$sum+filter_var($row['Price'], FILTER_SANITIZE_NUMBER_INT);
	
  }
echo "<form action='Pay.php?user=$user&cost=$sum'method='POST'><table style='margin-left:10%;'><tr><tr><td>Cost of your basket is: $sum CHF</td></tr></tr><tr><td >";
if($sum!=0){
echo "<input type='submit' name='pay' value='Pay and finish shopping'>";
}
echo "</td></tr><tr><td ></td></tr></form><tr><td><form action='Dresses.php'><input type='submit' name='continue' value='Continue shopping'></form></td></tr></table>";
$result2 = mysqli_query($mysqli,"SELECT `Type`,Command.`Color`,Command.`Size`,`Price`,`Photo`, products.ProductID FROM products,Command,users WHERE products.ProductID=Command.ProductID AND users.UserName=Command.userName AND users.username='$user'");
while($row = mysqli_fetch_array($result2))
  {
          
echo "<table class='tables' width='30%'>";
 echo "<tr><td valign='top' align='center'>"
     . '<img src="data:image/jpeg;base64,' . base64_encode($row['Photo']) . '" width="100" height="200">'
     . '</td></tr>';
  echo "<tr><td align='center'> Colors: " . $row['Color'] . "</td></tr>";
  echo "<tr><td align='center'> Sizes: " . $row['Size'] . "</td></tr>";
  echo "<tr><td align='center'> Price: ". $row['Price'] . "</td></tr>";
  $id=$row['ProductID'];
echo "<tr><td style='text-align:center'><form method='POST' action='BasketMod.php?user=$user&id=$id' ><input type='submit' value='Delete' name='Delete'/></form></td></tr>";
	
	
  }
echo "</table><br>";
?>

<?php include("footer.php"); ?>
