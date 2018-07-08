<?php
	include("login/config.php");
	$userid = htmlspecialchars($_POST['userid']);
	$userid = mysqli_real_escape_string($mysqli, $userid);
  $password = htmlspecialchars($_POST['password']);
  $password = mysqli_real_escape_string($mysqli, $password);
  //$hash = hash("sha512", $password);
  //echo $hash;
  	

	if(isset($userid) && $userid!="" && isset($password) && $password!=""){
		$_SESSION['logintried'] = true;
		$queryUser = "SELECT Username, Password FROM users WHERE
              Username = '$userid' AND Password = '$password'";
    $resultUser = mysqli_query($mysqli, $queryUser);
    
    $queryAdmin = "SELECT Username, Password FROM admin WHERE
              Username = '$userid' AND Password = '$password'";
    $resultAdmin = mysqli_query($mysqli, $queryAdmin);
    
		if($resultUser && $resultAdmin){
			if(mysqli_num_rows($resultUser) > 0){
    		$row=mysqli_fetch_array($resultUser);
				$_SESSION['login_user'] = $row[0];
				$_SESSION['user_type'] = "user";
				$_SESSION['invalid']=false;
    	}
			elseif(mysqli_num_rows($resultAdmin) > 0){
    		$row=mysqli_fetch_array($resultAdmin);
				$_SESSION['login_user'] = $row[0];
				$_SESSION['user_type'] = "admin";
				$_SESSION['invalid']=false;
    	}
    	else{//invalid username or password
    		$_SESSION['invalid']=true;
    	} 
  	}
  	else{
  		echo 'Could not connect to database';
  	}
  }	 
	
		mysqli_close($mysqli);
?>
