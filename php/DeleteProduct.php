<?php if($_SESSION['user_type']=="admin" && isset($_POST['ConfirmDeleteID'])){
	//change product with ID $_POST['ConfirmDeleteID'] to be IsVisible=0
	
	include("login/config.php"); // <!-- open database, do not forget to mysqli_close($mysqli); when done with -->
	
	$prodid=$_POST['ConfirmDeleteProductID'];//rename variable without quotes
	$queryDeleteProduct = "UPDATE products SET IsVisible='0' WHERE ProductID='$prodid'";
	$resultDeleteProduct = mysqli_query($mysqli, $queryDeleteProduct);
	
		if(!$resultDeleteProduct){
				echo "Could not connect to database (Delete Product)";
		}
	mysqli_close($mysqli);
	}
?>
