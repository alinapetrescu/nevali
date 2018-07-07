<?php if($_SESSION['user_type']=="admin"){

echo'<div id="admin-bar">
<div id="admin-bar-content">

	Admin: "'.$_SESSION['login_user'].'"<br/>';
	
	//Delete mode activated
 	if(isset($_POST['Edit'])){echo 'Mode: Edit<br/>';}
 	
 	//Delete mode activated
 	if(isset($_POST['Delete'])){echo 'Mode: Delete<br/>';}
 

	//To activate Delete mode
	echo'
	<form method="POST" style="display: inline-block;" >
		<input id="login" type="Submit" name="Delete"  value="Delete"/>
	</form>';
	
	//To activate Edit mode
	if(!isset($NewsPage)){
		echo'
		<form method="POST" style="display: inline-block;">
			<input id="login" type="Submit" name="Edit"  value="Edit"/>
		</form>';
 	}
 	//To activate CreatePopup
 	  if(!isset($page) || $page!="UserManagement")//no create button for user management
 		{
 		echo	' <button id="login" type="button" onclick="showCreateOnly()" value="Login">Create</button>'; 
		}
	
 	//Delete product engaged
 		include("ButtonConfirmDelete.php");

	
 	//Delete product confirmed
 	if(isset($_POST['ConfirmDeleteProductID'])){
 		include("DeleteProduct.php");
 	;}
 	if(isset($_POST['ConfirmDeleteClient'])){
 		include("DeleteClientSQL.php");
 	;}
 		
	
	

 	//To commit the edit instruction
	if(isset($_POST['EditProductID'])){
 		include("EditProduct.php");}
	if(isset($_POST['editClient'])){
 		include("EditClientSQLUpdate.php");}
  //TO Create object	
  	include("Create.php");

echo'	<br/></div></div>';


	echo '<div id="dialogCreate" title="Create product">';
		include("Createform.php");
	echo '</div>';

}?>
	



