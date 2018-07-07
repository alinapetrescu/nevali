<?php
if(!isset($NewsPage))//&& isset($producttype)) //Pour désactiver hors de Dresses/Shoes/Accessorize
		{//Formulaire création de produit
		echo '<form method="POST" enctype="multipart/form-data">
				Type <select name="CreateType">
  				<option value="Dress">Dress</option>
  				<option value="Shoes">Shoes</option>
  				<option value="Accessorize">Accessorize</option>
				</select> <br/>
				Colors <input type="text" name="CreateColor"/><br/>
				Sizes <input type="text" name="CreateSize"/><br/>
				Price <input type="text" name="CreatePrice" value=" CHF"/><br/>
				IsVisible <input type="text" name="CreateIsVisible" value="1"/><br/>
				Choose Image <input type="file" name="CreateImageFile"/><br/>	
				Please check and confirm<br/>
				<input class="button" type="submit" name="CreateInstruction" value="Create Now" style="margin: 0 auto;"/>
		</form>
		';}
else{//Formulaire création de produit
		echo '<form method="POST">
				Title <input type="text" name="title"/><br/>
				News<br/>
				<textarea  style="text-align:justify;" cols="65" rows="15" name="newscontent" 
					onfocus="if(this.value==this.defaultValue)this.value=\'\';" 
					onblur="if(this.value==\'\')this.value=this.defaultValue;">You can write your news here.
        </textarea><br/>
				Please check and confirm 
				<input class="button" type="submit" name="CreateNews" value="Create News" style="margin: 0 auto;"/>
		</form>
		';}

?>
