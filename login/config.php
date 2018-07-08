<?php
	if(!isset($_SESSION)){
	session_start();
	}
	
  $dbhost="localhost";
  $dbuser="radovano";
  $dbpass="newpassword";
  $dbname="proj2013-radovano";
  
  $mysqli = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if(!$mysqli){
		echo 'Can\'t connect to database';
    exit;
	}
?>
