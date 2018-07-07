<?php	
if($_SESSION["user_type"]="admin")
{//GUARD for admin only features
	$previouscolortext=$row['Color'];
	$previoussizetext=$row['Size'];
	$previouspricetext=$row['Price'];
	$previousIsVisibletext=$row['IsVisible'];

		echo "<tr><td valign='top' align='center'>";
		echo '<a class="fancybox" rel="gallery1" href="data:image/jpeg;base64,'.base64_encode($row['Photo']).'">';
  	echo '<img src="data:image/jpeg;base64,'.base64_encode($row['Photo']).'" width="200" height="300"
     			 title="Click to zoom in"/>';
		echo '</a></td></tr>';
		echo'<tr><td align=\'center\'> 
			<form method="POST">
				<input type="hidden" name="EditProductID" value="'.$prodId.'" required/>
	 			Colors <input title="Please separate colors with comma and space" type="text" name="newcolortext" value="'.$previouscolortext.'" required/> </br>
				Sizes <input type="text" title="Please separate sizes with space" name="newsizetext"value="'.$previoussizetext.'" required/> </br>
				Price <input type="text" name="newpricetext" value="'.$previouspricetext.'" required/> </br>
				Visible <input type="text" name="newIsVisibletext" value="'.$previousIsVisibletext.'" required/> </br>
				<input type="submit" name="editproduct" value="Edit" style="margin: 0 auto;"/>
			</form></td></tr>';
		//echo "<tr><td align='center'> Colors: " . $row['Color'] . "</td></tr>";
		//echo "<tr><td align='center'> Sizes: " . $row['Size'] . "</td></tr>";
		//echo "<tr><td align='center'> Price: ". $row['Price'] . "</td></tr>";
}
 ?>
