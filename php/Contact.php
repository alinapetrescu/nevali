<?php include("phpsessionheader.php"); ?> <!-- Login and session management, at the top of the file -->
<!DOCTYPE html>
<?php include("jquery.php"); ?>

<html lang="fr">
   <head>
	<meta charset="ISO-8859-1">
				<link rel="stylesheet" href="css/Nevali.css" />  <!-- Fichier CSS Global -->
        <link rel="stylesheet" href="login/logininfobox.css" />  <!-- Fichier CSS pour la gestion du login -->
        <link rel="stylesheet" href="css/galerie-menu.css" />  <!-- Fichier CSS -->
       <title>Nevali -- Feedback</title>
   </head>
<h1 id="homeTitle">
    <img src="logos/FeedbackLogo.png" alt="Dresses"/>
</h1>
	
<body><div id="bodydiv">
	<a href="home.php" id="homepage">
		<i>Back to Home Page</i>
	</a>
<?php include("login/logininfobox.php"); ?> <!-- Login management, at the start of <body> -->
<br/><?php include("galerie-home.php"); ?> <!-- Menu bar with home pictures -->
<?php if($_SESSION['user_type']=="visitor"){
		include("visitor-bar.php");
		}
?>
<?php include("login/config.php"); ?> <!-- open database, do not forget to mysqli_close($mysqli); when done with -->
<?php
$thumb = mysqli_query($mysqli,"SELECT * FROM thumbs");
$up=0;
$down=0;
while($row = mysqli_fetch_array($thumb)){
$up=$row['up'];
$down=$row['down'];
}
?>
  <table width="500" height="100" style="margin-left:20%;margin-top:7%" cellpadding="5" cellspacing="0">
	<tr>
      <td id="comment" valign="baseline">
<?php
$good=$_GET['good'];
$bad=$_GET['bad'];
if($good!=''){
echo "<p style='color:gold;'>Thank you for your help</p>";
}else if($bad!=''){
echo "<p style='color:red;'>Please fill all fields marked with *</p>";
}
?>
        <p>
          <text style="color:red;">*</text> YOUR COMMENT
        </p>
       <form method="POST"> 
	<?php
	$com=$_GET['com'];
	$goodCo=$_GET['goodCo'];
	if($goodCo!=''){?>
		<textarea style="float:left" id="area1" cols="70" rows="15" name="comment" style="margin-left:24%;-webkit-border-radius: 20px; -moz-border-radius: 20px; border-radius: 20px;" onblur="if(this.value=='')this.value=this.defaultValue;"><?php echo $goodCo; ?>
        </textarea><?php	
	}
	else if($com==''){
	?>
            <textarea style="float:left" id="area1" cols="70" rows="15" name="comment" style="margin-left:24%;-webkit-border-radius: 20px; -moz-border-radius: 20px; border-radius: 20px;" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">Please write good and bad things that you noticed on this website so we can make it even better. Type your message here...
        </textarea>
	<?php
	}else{
	?>
	<textarea style="float:left" id="area1" cols="70" rows="15" name="comment" style="margin-left:24%;-webkit-border-radius: 20px; -moz-border-radius: 20px; border-radius: 20px;"><?php echo $com?>
</textarea>
	<?php	
	}
	?>
     
        </td>
      </tr>	
       <tr>
            <td valign="top" bgcolor="black">
		<text style="color:red;">*</text> NAME
          <br/>

 	  <?php
	  $name=$_GET['name'];
	  $goodNa=$_GET['goodN'];
	  if($goodNa!=''){
		?>
          <input type="text" style="-webkit-border-radius: 20%; -moz-border-radius: 20%; border-radius: 20%;" size="25" maxlength="40" align="center" name="name" value="<?php echo $goodNa ?>"/> 
	  <?php
	  }
	  else if($name==''){
	  ?>
          <input id='name' type="text" style="-webkit-border-radius: 20%; -moz-border-radius: 20%; border-radius: 20%;" size="25" maxlength="40" align="center" name="name"/> 
	  <?php
	    }else{
	   ?>
	   <input id='name' type="text" style="-webkit-border-radius: 20%; -moz-border-radius: 20%; border-radius: 20%;" size="25" maxlength="40" align="center" name="name" value="<?php echo $name ?>"/>
	   <?php
	   }
	?>           
              <input type="submit" name="submit" value="Send" size="20"/>
              <input type="submit" name="clear" value="Clear" size="20"/>
            </td>
      </tr>
	<tr>
	<td>Good site?
	<?php echo"<button name='up' type='submit' title=$up>
    	<img src='pictures/thUp.png' />

	</button>

	<button name='down' type='submit' title=$down>
    	<img src='pictures/thDo.png' />

	</button></form>";?>
	</td>
	</tr>
  </table>

<?php
if (isset($_POST['up'])){
$comment=$_POST['comment'];
$name=$_POST['name'];
$up=$up+1;
$updateD=mysqli_query($mysqli,"UPDATE thumbs SET up=$up");
if($comment!=''&&$name!=''){
echo "<script>window.location.href = 'Contact.php?com=$comment&name=$name';</script>";
}else{
echo "<script>window.location.href = 'Contact.php';</script>";
}
}

if (isset($_REQUEST['down'])){
$comment=$_POST['comment'];
$name=$_POST['name'];
$down=$down+1;
$updateD=mysqli_query($mysqli,"UPDATE thumbs SET down=$down");
if($comment!=''&&$name!=''){
echo "<script>window.location.href = 'Contact.php?com=$comment&name=$name';</script>";
}else{
echo "<script>window.location.href = 'Contact.php';</script>";
}
}

if(isset($_POST['submit'])){
$bad='';
$good='';
   $name=$_POST['name'];
   $comment=$_POST['comment'];
     if(strncmp($comment,"Please write good and bad things that you noticed on this website so we can make it even better. Type your message here...",122)!=0&&$name!='') {
         $result = mysqli_query($mysqli,"INSERT INTO comment VALUES ('$name','$comment')");
         if(!$result){
            echo "Something went wrong, we couldn't save your comment";
	 }else{
	    $good=1;
	 } 
}else{
   $bad=1;
   if($name!=''){
	$goodName=$name;
   }else if(strncmp($comment,"Please write good and bad things that you noticed on this website so we can make it even better. Type your message here...",122)!=0){
	$goodCom=$comment;
}
}
echo "<script>window.location.href = 'Contact.php?bad=$bad&good=$good&goodN=$goodName&goodCo=$goodCom';</script>";
}?>
<?php
if(isset($_POST['clear'])){
echo "<script>document.getElementById('area1').value='';
document.getElementById('name').value='';
</script>";
}

?>



<?php
 if($_SESSION['user_type']=="admin"){
		$ContactPage= true; // choix du formulaire CreateForm.php, supprime bouton edit
//		include("admin-bar.php");
		}
?>
		
<?php if($_SESSION['user_type']=="admin"){
				include("comment-delete.php");}
			include("comment-show.php"); ?>
  
</div></body>
<?php include("footer.php") ?>
</html>
