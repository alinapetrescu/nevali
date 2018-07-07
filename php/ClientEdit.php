<?php	
if($_SESSION["user_type"]="admin")
{//GUARD for admin only features
	$UserID=$row['UserID'];//read only from admin perspective (bad admin usage could corrupt unicity)
	$previousFirst=$row['Firstname'];
	$previousLast=$row['Lastname'];
	$previousName=$row['Username'];
	$previousPass=$row['Password'];
	echo "<table frame='box' align='center' class='tables' class='EditTableUserForAdmin'>";
  echo "<tr><td align='center'> User ID: " . $row['UserID'] . "</td></tr>";
  echo'
	<tr><td align="center"> 
  		<form method="POST">
					<input type="hidden" name="EditClientID" value="'.$UserID.'" required/>
		 			Firstname <input type="text" name="newFirstname" value="'.$previousFirst.'"/> </br>
					Lastname  <input type="text" name="newLastname" value="'.$previousLast.'"/> </br>
					Username  <input type="text" name="newName" value="'.$previousName.'" required/> </br>
					Password  <input type="text" name="newPassword" value="'.$previousPass.'" required/> </br>
					<input type="submit" name="editClient" value="Edit" style="margin: 0 auto;"/>
			</form>
	</td></tr>'
	;
	echo "</table>";
}
 ?>
