<!--
Contains the Popup/Dialogs div used from logininfobox.php
-->
     
    <div id="dialogSearch" class="popup" title="Search">
        <form action="SearchRes.php" method="POST">
        <table valign="center">
	<tr>
        <td>Type </td>
        <td><select name="type">
            <option value="Any">Any</option>
            <option value="Dress">Dresses</option>
            <option value="Shoes">Shoes</option>
            <option value="Accessorize">Accesorize</option>
            </select></td>
        </tr>
        <tr>
        <td>Color </td>
        <td>
        <input style="float:right;" type="text" onfocus="if (this.value == this.defaultValue) {this.value = '';}" onblur="if (this.value == '') {this.value = this.defaultValue;}" value="Any" name="color"/>
        </td>
        </tr>
        <tr>
        <td>Min price </td>
        <td><input style="float:left;" size="15" type="text" onfocus="if (this.value == this.defaultValue) {this.value = '';}" onblur="if (this.value == '') {this.value = this.defaultValue;}" value="Any" name="Miprize"/>CHF</td>
        </tr>
        <tr>
        <td>Max price </td>
        <td><input type="text" size="15" style="float:left;" onfocus="if (this.value == this.defaultValue) {this.value = '';}" onblur="if (this.value == '') {this.value = this.defaultValue;}" value="Any" name="Maprize"/>CHF</td>
        </tr>
        <tr>
        <td>Size </td>
        <td><input  type="text" onfocus="if (this.value == this.defaultValue) {this.value = '';}" onblur="if (this.value == '') {this.value = this.defaultValue;}" value="Any" name="size"/></td>
        </tr>
        <tr>
        <td><input style="float:left;" type="submit" value="Start search"/></td>
        </tr>
        </table>
        </form>
    </div>



    <div id="dialogLogin" class="popup" title="Login">
        <?php include("login/login2.php");
        	if($Shakeopenlogin){
						echo'
							<script>
								$( "#dialogLogin" ).dialog("open");
								$( "#dialogLogin" ).effect("shake");
							</script>';
					}
				?>
    </div>


    
<?php // Partie a afficher
if($_SESSION['user_type']=="visitor"){//visitor only
  echo '<div id="dialogRegister" class="popup" title="Register">';
	if(!$registration){
		echo '<div title="Registration">
					<form method="POST" enctype="multipart/form-data">
				<text style="color:red">*</text>Firstname <input type="text" name="firstname" required/><br/>
				<text style="color:red">*</text>Lastname <input type="text" name="lastname" required/><br/>
				<text style="color:red">*</text>Username <input type="text" name="userid" required/><br/>
				<text style="color:red">*</text>Password <input type="password" name="password" required/><br/>
				<text style="color:red">*</text>Confirm password <input type="password" name="repassword" required/><br/>	
				';
		if($PasswordUnequal){
			echo'Passwords do not match !<br/>';
		}				
		echo'		
				Please CHECK and confirm!<br/>
				<input class="button" type="submit" name="register" value="Register Now" style="margin: 0 auto;"/>
				</form></div>';
	}
	echo '</div>';
	echo'
				<script>
							$( "#dialogRegister" ).dialog({ autoOpen: false });
							$( "#dialogRegister" ).dialog( "option", "dialogClass", "initialised" );
							$( "#dialogRegister" ).dialog({ draggable: false });
							$( "#dialogRegister" ).dialog( "option", "height", "auto" );
							$( "#dialogRegister" ).dialog( "option", "width", "auto" );
							$( "#dialogRegister" ).dialog( "option", "hide", "fade" );
							$( "#dialogRegister" ).dialog( "option", "modal", true );
							$( "#dialogRegister" ).dialog( "option", "resizable", false );
							//$( "#dialogRegister" ).dialog( "option", "position", {my: "top", at: "center", of: "window"} );
							$( "#dialogRegister" ).dialog( "option", "position", "top");
				</script>
				';
	if($PasswordUnequal){
			echo'
				<script>
							$( "#dialogRegister" ).dialog("open");
							$( "#dialogRegister" ).effect("shake");
				</script>';
	}
}
?>
