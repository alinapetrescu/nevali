<?php
if($_SESSION['user_type']=="admin")
{
//Confirm question written in admin bar 
 	if(isset($_POST['DeleteProductID'])){echo "<br/>Delete product ".$_POST['DeleteProductID']."?<br/>";}
 	if(isset($_POST['DeleteClientOrder'])){echo "<br/>Delete client ".$_POST['DeleteClientID']."?<br/>";}

//Button form for confirmation 
	if($_SESSION['user_type']=="admin" && isset($_POST['DeleteID'])){
		echo'
			<form method="POST" style="display: inline;">
				<input type="hidden" name="ConfirmDeleteProductID" value="'.$_POST['DeleteProductID'].'" />
				<input id="login" type="Submit" name="ConfirmDeleteID"  value="Confirm delete product '.$_POST['DeleteProductID'].'"/>
			</form>';
	}
	
	if($_SESSION['user_type']=="admin" && isset($_POST['DeleteClientOrder'])){
		echo'
			<form method="POST" style="display: inline;">
				<input type="hidden" name="ConfirmDeleteClientID" value="'.$_POST['DeleteClientID'].'" />
				<input id="login" type="Submit" name="ConfirmDeleteClient" value="Confirm delete client '.$_POST['DeleteClientID'].'"/>
			</form>';
	}
}
?>
