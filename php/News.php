<?php include("phpsessionheader.php"); ?> <!-- Login and session management, at the top of the file -->
<!DOCTYPE html>
<?php include("jquery.php"); ?>

<html lang="fr">
   <head>
	<meta charset="ISO-8859-1">
        <link rel="stylesheet" href="css/galerie-menu.css" />  <!-- Fichier CSS -->
        <link rel="stylesheet" href="css/Nevali.css" />  <!-- Fichier CSS Global -->
        <link rel="stylesheet" href="login/logininfobox.css" />  <!-- Fichier CSS pour la gestion du login -->
				<link rel="stylesheet" href="print.css" type="text/css" media="print" />
        <link rel="shortcut icon" type="image/x-icon" href="favicon2.ico"> 
        <?php if($_SESSION['user_type']=="admin"){
						echo'<link rel="stylesheet" href="css/admin.css" />  <!-- Fichier CSS specifique admins -->';}
				?>
       <title>Nevali -- News</title>
   </head>
<h1 id="homeTitle">
    <img src="logos/NewsLogo.png" alt="News"/>
</h1>
<body>
<div id="bodydiv">

<?php include("login/logininfobox.php"); ?> <!-- Login and session management, at the start of <body> -->

<a href="home.php" id="homepage">
		<i>Back to Home Page</i>
</a>
<br/><?php include("galerie-home.php"); ?>
<?php if($_SESSION['user_type']=="visitor"){
		include("visitor-bar.php");
		}
?>
<?php if($_SESSION['user_type']=="admin"){
		$NewsPage= true; // choix du formulaire CreateForm.php, supprime bouton edit
		include("admin-bar.php");}
		?>
		
<?php if($_SESSION['user_type']=="admin"){
				include("news-add.php");}
			include("news-show.php"); ?>
</div></body>
</html>

<?php include("footer.php"); ?>
