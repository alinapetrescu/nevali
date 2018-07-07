<?php if($_SESSION['user_type']=="admin" && isset($_POST['EditProductID']))
{
//update product properties with form POST datas
include("login/config.php"); // <!-- open database, do not forget to mysqli_close($mysqli); when done with -->
$prodid=$_POST['EditProductID'];//rename variable without quotes
$newcolor=$_POST['newcolortext'];
$newsize=$_POST['newsizetext'];
$newprice=$_POST['newpricetext'];
$newIsVisible=$_POST['newIsVisibletext'];

$queryEditProduct = "UPDATE products
												SET Color	='$newcolor',
														Size	='$newsize',
														Price	='$newprice',
														IsVisible='$newIsVisible'
												WHERE ProductID='$prodid'";
$resultEditProduct = mysqli_query($mysqli, $queryEditProduct);
	if(!$resultEditProduct){echo "Could not connect to database (Edit Product)";}
	else{echo "successful edit.";}
mysqli_close($mysqli);
}
?>
