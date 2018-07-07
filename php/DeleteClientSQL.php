<?php if($_SESSION['user_type']=="admin" && isset($_POST['ConfirmDeleteClientID'])){
	//change product with ID $_POST['ConfirmDeleteID'] to be IsVisible=0
	
	include("login/config.php"); // <!-- open database, do not forget to mysqli_close($mysqli); when done with -->
	
	$clientid=$_POST['ConfirmDeleteClientID'];//rename variable without quotes
	//retrieve username
	$queryUserName = "SELECT Username FROM users WHERE UserID='$clientid'";
	$resultUserName = mysqli_query($mysqli, $queryUserName);
	$row = mysqli_fetch_array($resultUserName);
	$username=$row['Username'];
	//echo($username);
		if(!$resultUserName){
				echo "Could not connect to database (retrieve username)";
		}
	$queryDeleteClient1 = 
	"DELETE FROM  History 
					WHERE userName='$username'
					;
	";
	$queryDeleteClient3 = 
	"DELETE FROM  Command
					WHERE userName='$username'
					;
	";
	$queryDeleteClient2 = 
	"DELETE FROM users
					WHERE Username='$username'
					";
	
	$resultDeleteClient2 = mysqli_query($mysqli, $queryDeleteClient2);
		if(!$resultDeleteClient2){
				echo "Could not connect to database (Delete Client; users)";
		}
	$resultDeleteClient1 = mysqli_query($mysqli, $queryDeleteClient1);
		if(!$resultDeleteClient1){
				echo "Could not connect to database (Delete Client; History)";
		}
	$resultDeleteClient3 = mysqli_query($mysqli, $queryDeleteClient3);
		if(!$resultDeleteClient3){
				echo "Could not connect to database (Delete Client; Command)";
		}
	mysqli_close($mysqli);
	}
?>
