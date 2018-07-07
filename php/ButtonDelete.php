<?php if($_SESSION['user_type']=="admin" && isset($_POST['Delete'])){
echo "<tr><td align='center'>";
echo'
	<form method="POST">
		<input type="hidden" name="DeleteProductID" value="'.$prodId.'" />
		<input id="login" type="Submit" name="DeleteID"  value="Delete product '.$prodId.'"/>
	</form>';
echo "</td></tr>";
}
?>
