<?php session_start(); //retrouve les variables de session
			$_SESSION['IP']= $_SERVER['REMOTE_ADDR'];
			//définit la variable à visiteur par défaut (si non attribuée)
			if(!isset($_SESSION['user_type'])){$_SESSION['user_type']="visitor";}
?> 
<?php include("login/login1.php"); //code du retour post du formulaire de login  ?>
<?php include("login/logout.php"); //code de logout (et recharge la homepage)  ?>
<?php include("visitor-bar.php");  //(visitor only)  code de retour du formulaire register ?>
