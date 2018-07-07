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
       <title>Nevali -- Dresses</title>
   </head>
  <h1 id="homeTitle">
    <img src="logos/DressesLogo.png" alt="Dresses"/>
</h1>
<body>
<div id="bodydiv"  class="my-sticky-element">

<?php include("login/logininfobox.php"); ?> <!-- Login management, at the start of <body> -->	

<a href="home.php" id="homepage">
		<i>Back to Home Page</i>
	</a>
<br/>
<?php include("galerie-home.php"); ?> <!-- Menu bar with home pictures -->
<?php if($_SESSION['user_type']=="admin"){include("admin-bar.php");} //admin-bar integration ?>
<?php if($_SESSION['user_type']=="visitor"){
		include("visitor-bar.php");
		}
?>

<?php //Defines a variable for code factorisation. Change it to Shoes, Accessorizes or whatever new product.
$producttype="Dress"; //Corresponds to values of Type field
include("TableProducts.php"); //Create the showing table of products ?>

</div>
<script type="text/javascript" src="http://imakewebthings.com/jquery-waypoints/shortcuts/sticky-elements/waypoints-sticky.min.js"></script>
</body></html>

<?php include("footer.php"); ?>
