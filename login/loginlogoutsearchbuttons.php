<!-- 
Contains the Login/Logout and Search button
*Login: use the <button> tag and javascript to popup "dialogLogin" Login dialog from client side
*Search: use the <button> tag and javascript to popup "dialog" Search dialog from client side
*Logout: use a <form> tag and <input> button of submit type to induce a POST action, inducing a reaction
on the server side through PHP. (management of the PHP session variables, done in logout.php)
-->

<?php //fonctions de script pour la gestion des popups et eventuellement du jQuerry UI
include("ScriptPopupDialog.js");
?>

	<div id="logsear">
			<?php	if($_SESSION['user_type']=="user" || $_SESSION['user_type']=="admin"){
		  						echo '<form method="POST" style="display: inline-block;">
														<input id="login" type="Submit" name="Logout"  value="Logout"/>
												</form>';
		  						//echo	'<input id="login" type="Submit" name="Logout" value="Logout"/>';
		  						}
		  			else{	echo	'<button id="login" type="button" onclick="showLoginDialogOnly()" value="Login">Login</button>';
		  						//echo '<input id="login"  type="Submit" name="Login"  value="Login"/>'; 
		  						}	
		  ?>
		<?php if($_SESSION['user_type']=="user"){
			echo '<form action="ByAction.php" style="display: inline-block;"><input id="login" type="submit" value="My basket"></form> ';
			echo '<form action="profile.php" style="display: inline-block;"><input id="login" type="submit" value="My profile"></form>';
		}?>
		<?php if($_SESSION['user_type']=="admin"){
			echo '<form action="UserMan.php" style="display: inline-block;"><input id="login" type="submit" value="User management"></form> ';
			
		}?>
		<button id="search" type="button" style="display: inline-block;" onclick="showSearchDialogOnly()" value="Search">Search</button><br/>
   </div>

