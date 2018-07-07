<?php session_start();
//if($_SESSION['user_type']=="admin" && isset($_POST['CreateInstruction']) ){

 include("login/config.php"); // <!-- open database, do not forget to mysqli_close($mysqli); when done with -->
			//$ProductID		= 50; // $_POST[''];
			$Type					= $_POST['CreateType'];
			$Color				= $_POST['CreateColor'];
			$Size					= $_POST['CreateSize'];
			$Price				= $_POST['CreatePrice'];
			$PhotoBinaire	= $_FILES['CreateImageFile']['name'];
			$IsVisible		= $_POST['CreateIsVisible'];
			
/* For debug purpose: investigate the return of $_POST and $_FILES
										if ($_FILES["file"]["error"] > 0)
										{
										echo "Error: " . $_FILES["file"]["error"] . "<br>";
										}
										else
										{
										echo "Upload: " . $_FILES["CreateImageFile"]["name"] . "<br>";
										echo "Type: " . $_FILES["CreateImageFile"]["type"] . "<br>";
										echo "Size: " . ($_FILES["CreateImageFile"]["size"] / 1024) . " kB<br>";
										echo "Stored in: " . $_FILES["CreateImageFile"]["tmp_name"] . " <br>";
										}
*/
			$TMPFILEADDRESS=$_FILES["CreateImageFile"]["tmp_name"];
  		$PhotoBinaire = "0x".bin2hex(file_get_contents($TMPFILEADDRESS));
  		/*echo $PhotoBinaire;/* Check the true binary in hex*/
			$queryCreate = "INSERT 
											INTO products 
											(Type, Color, Size, Price, Photo, IsVisible) 
											VALUES ('".$Type."', '".$Color."', '".$Size."',
																	 '".$Price."', ".$PhotoBinaire.", '".$IsVisible."');";
			$resultCreate = mysqli_query($mysqli, $queryCreate);

			mysqli_close($mysqli);
//}
?>
