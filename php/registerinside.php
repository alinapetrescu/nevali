<?php //Partie code processing
	session_start();
	include("login/config.php");
	if(isset($_POST['register'])){
		$userid = htmlspecialchars($_POST['userid']);
		$userid = mysqli_real_escape_string($mysqli, $userid);
		$password = htmlspecialchars($_POST['password']);
		$password = mysqli_real_escape_string($mysqli, $password);
		$repassword = htmlspecialchars($_POST['repassword']);
		$repassword = mysqli_real_escape_string($mysqli, $repassword);
		$firstname = htmlspecialchars($_POST['firstname']);
		$firstname = mysqli_real_escape_string($mysqli, $firstname);
		$lastname	= htmlspecialchars($_POST['lastname']);
		$lastname = mysqli_real_escape_string($mysqli, $lastname);
		
		if($password==$repassword)	
		{					$queryUser = "SELECT Username FROM users WHERE Username = '$userid'";
							$resultUser = mysqli_query($mysqli, $queryUser);
				
							$queryAdmin = "SELECT Username FROM admin WHERE Username = '$userid'";
							$resultAdmin = mysqli_query($mysqli, $queryAdmin);
				
							if($resultUser && $resultAdmin){//on a reçu une réponse de la requete sql
								 if(mysqli_num_rows($resultUser) > 0){//on a trouve $userid dans la table users
										echo 'This username already exists. Please choose another one.';
										$invalid = true;
								}elseif(mysqli_num_rows($resultAdmin) > 0){//on a trouve $userid dans la table admin
										echo 'This username already exists. Please choose another one.';
										$invalid = true;
								}elseif($userid==''){//test de validite du username 
										echo 'Please enter a username.<br/>';  	
								}elseif($password==''){//test de validite du password 
										echo 'Please enter a password.<br/>';  	
								}elseif($firstname==''){//test de validite du prénom 
										echo 'Please enter a firstname.<br/>';
								}elseif($lastname==''){//test de validite du nom de famille 
										echo 'Please enter a lastname.<br/>';
								}else{
									//The username is available
									$queryRegister = "INSERT 
					 											INTO users (Password, Username, Firstname, Lastname) 
																VALUES ('".$password."', '".$userid."', '".$firstname."', '".$lastname."');";
									$resQueryRegister = mysqli_query($mysqli, $queryRegister);
									if($resQueryRegister){
											$registration = true;
											$_SESSION['login_user'] = $userid;
											$_SESSION['user_type'] = "user";
									}
									else{ echo"INSERT: Cannot commit query";}
								}
							}
					 	 else{echo 'Can\'t connect to the database';exit;}
		}
		else{$PasswordUnequal = true;}	
	}
	if(!$registration){
		if(isset($_SESSION['user_type']) && ($_SESSION['user_type']=="user" || $_SESSION['user_type']=="admin")){		
		echo 'You are already logged in as '.$_SESSION['user_type'].' "'.$_SESSION['login_user'].'".<br/>';
		echo 'Are you sure you want to register ?<br/>';
		}
	}
?>


