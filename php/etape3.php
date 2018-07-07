<?php include("phpsessionheader.php"); ?> <!-- Login and session management, at the top of the file -->
<!DOCTYPE html>
<?php include("jquery.php"); ?>
<html lang="fr">
<head>
	<meta charset="ISO-8859-1">   
        <link rel="stylesheet" href="css/Nevali.css" />  <!-- Fichier CSS Global -->
        <link rel="stylesheet" href="login/logininfobox.css" />  <!-- Fichier CSS pour la gestion du login -->
        <link rel="stylesheet" href="css/galerie-home.css" />  <!-- Fichier CSS home, pour un grand bandeau -->
        <?php if($_SESSION['user_type']=="admin"){
						echo'<link rel="stylesheet" href="css/admin.css" />  <!-- Fichier CSS specifique admins -->';}
				?>
				<!--<STYLE type="text/css">
   							#myid 			{border-width: 1; border: solid; text-align: center}
   							#body				{height: 100%
   														/*margin-right: 7.5%;
   														margin-left: 7.5%*/}
	   							#title			{height: 10%}
   								#bodydiv		{height: 60%;
   															/*margin-left:0%;
   															margin-right:0%;*/
   															margin-top:80px} 									
		   							#loginfo			{height: 20%;
		   															margin-right:7.5%}
		   							#galerie-menu	{height: 80%}
		   								#galerie-menu a 	{height: 100%}
		   								#galerie-menu img {min-width: 100%;
		   																	 min-height:100%;
		   																	 height: 300px}
 				</STYLE>-->
 				<STYLE type="text/css">
   						#loginfo			{margin-right:7.5%}
 				</STYLE>
				
				
       <title>Nevali -- Home Page</title>
   </head>

<h1 id="Title"><i>Nevali</i></h1>

<?php include("login/logininfobox.php"); ?> <!-- Login and session management, at the start of <body> -->
<br/>
 
<body>
<div id="bodydiv">
<?php include("galerie-home.php"); ?>
</div>
</body>
</html>
