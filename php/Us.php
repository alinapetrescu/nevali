<?php include("phpsessionheader.php"); ?> <!-- Login and session management, at the top of the file -->
<!DOCTYPE html>
<?php include("jquery.php"); ?>
<html lang="fr">
   <head>
	<meta charset="ISO-8859-1">
				<link rel="stylesheet" href="css/Nevali.css" />  <!-- Fichier CSS Global -->
        <link rel="stylesheet" href="login/logininfobox.css" />  <!-- Fichier CSS pour la gestion du login -->
        <link rel="stylesheet" href="css/galerie-menu.css" />  <!-- Fichier CSS -->
        <link rel="shortcut icon" type="image/x-icon" href="favicon2.ico"> 
       <title>Nevali -- About us</title>
   </head>
	<h1 id="homeTitle">
    <img src="logos/UsLogo.png" alt="About Us"/>
</h1>
<body>
<div id="bodydiv">	
<a href="home.php" id="homepage">
		<i>Back to Home Page</i>
</a>

<?php include("login/logininfobox.php"); ?> <!-- Login management, at the start of <body> -->
<br/>
<?php include("galerie-home.php"); ?>
<?php if($_SESSION['user_type']=="visitor"){
		include("visitor-bar.php");
		}
?>
<h3 style='margin-top:2%;'> Who are we?</h3>
<p>
<i>*** We are two beautiful girls who love fashion and who decided to do a project about this ***</i>
</p>

<table>
	<tr>
		<td width="20%">
			<img width="130" height="180" src="pictures/Alina.jpg" alt="Alina"/>
		</td>
		<td width="30%">
		Firstname: Alina<br/>
		Last name: Petrescu<br/>
		Birth: 07.09.1991<br/>
		Nationality: Swiss<br/>
		Hobby: Fashion & Computer Science<br/>
		Contact: alina.petrescu@unifr.ch
		</td>
		<td></td>
		<td width="30%">
		Firstname: Nevena<br/>
		Last name: Radovanovic<br/>
		Birth: 24.06.1993<br/>
		Nationality: Serbian<br/>
		Hobby: Fashion & Computer Science<br/>
		Contact: nevena.radovanovic@unifr.ch
		</td>
		<td width="25%">
			<img style="float:right;" width="160" height="180" src="pictures/Nevena.jpg" alt="Nevena"/>
		</td>
	</tr>
</table>

<h3 style='margin-top:2%;'> Interested in this site?</h3>
<p>
<i> Just contact us on our mail or give us a phone call!</i>
</p>

</div>

</body>
</html>
<?php include("footer.php"); ?>
