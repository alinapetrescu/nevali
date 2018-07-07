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
       <title>Nevali -- Shoes</title>
   </head>
<h1 id="homeTitle">
    <img src="logos/ShoesLogo.png" alt="Shoes"/>
</h1>
<body><div id="bodydiv">
	<a href="home.php" id="homepage">
		<i>Back to Home Page</i>
	</a>
<?php include("login/logininfobox.php"); ?> <!-- Login management, at the start of <body> -->
<br/>
<?php include("galerie-home.php"); ?> <!-- Menu bar with home pictures -->
<?php if($_SESSION['user_type']=="admin"){include("admin-bar.php");} //admin-bar integration, don't forget css ?>
<?php if($_SESSION['user_type']=="visitor"){
		include("visitor-bar.php");
		}
?>

<?php

function data_uri($file, $mime) 
{  
  $contents = file_get_contents($file);
  $base64   = base64_encode($contents); 
  return ('data:' . $mime . ';base64,' . $base64);
}
?>


<?php //Defines a variable for code factorisation. Change it to Shoes, Accessorizes or whatever new product.
$producttype="Shoes"; //Corresponds to values of Type field
include("TableProducts.php"); //Create the showing table of products ?>

</div></body>
</html>

<?php include("footer.php"); ?>
