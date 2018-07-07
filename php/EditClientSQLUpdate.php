<?php if($_SESSION['user_type']=="admin" && isset($_POST['editClient']))
{
//update product properties with form POST datas
include("login/config.php"); // <!-- open database, do not forget to mysqli_close($mysqli); when done with -->
$clientId=$_POST['EditClientID'];//rename variable without quotes
$newFirst=$_POST['newFirstname'];
$newLast=$_POST['newLastname'];
$newName=$_POST['newName'];
$newPass=$_POST['newPassword'];

$queryEditClient = "UPDATE users
												SET Firstname	='$newFirst',
														Lastname	='$newLast',
														Username	='$newName',
														Password  ='$newPass'
												WHERE UserID='$clientId'";
$resultEditClient = mysqli_query($mysqli, $queryEditClient);
	if(!$resultEditClient){echo "Could not connect to database (Edit Client)";}
	else{echo "success! edited Client ".$clientId;}
mysqli_close($mysqli);
}
?>
