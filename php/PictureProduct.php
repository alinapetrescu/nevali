<?php	
	echo "<tr><td valign='top' align='center'>";
	echo '<a class="fancybox" rel="gallery1" href="data:image/jpeg;base64,'.base64_encode($row['Photo']).'">';
  echo '<img src="data:image/jpeg;base64,'.base64_encode($row['Photo']).'" width="200" height="300"
     			 title="Click to zoom in"/>';
  echo	'</a></td></tr>
  ';
  echo "<tr><td align='center'> Colors: " . $row['Color'] . "</td></tr>";
  
  echo "<tr><td align='center'> Sizes: " . $row['Size'] . "</td></tr>";
  
  echo "<tr><td align='center'> Price: ". $row['Price'] . "</td></tr>";

 
 ?>
