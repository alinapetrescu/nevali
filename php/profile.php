<?php include("phpsessionheader.php");?> <!-- Login and session management, at the top of the file -->
<!DOCTYPE html>
<?php include("jquery.php"); ?>

<html lang="fr">
   <head>
	<meta charset="ISO-8859-1">   
        <link rel="stylesheet" href="css/Nevali.css" />  <!-- Fichier CSS Global -->
        <link rel="stylesheet" href="login/logininfobox.css" />  <!-- Fichier CSS pour la gestion du login -->
        <link rel="stylesheet" href="css/galerie-menu.css" />  <!-- Fichier CSS home, pour un grand bandeau -->
				<link rel="stylesheet" href="print.css" type="text/css" media="print" />
        <link rel="shortcut icon" type="image/x-icon" href="favicon2.ico"> 
       <title>Nevali -- Profile</title>
   </head>
<h1 id="homeTitle">
    <img src="logos/ProfileLogo.png" alt="Profile"/>
</h1>
<body>
<div id="bodydiv">
<?php include("login/logininfobox.php"); ?> <!-- Login management, at the start of <body> -->
<a href="home.php" id="homepage">
		<i>Back to Home Page</i>
</a>
<br/>
<?php include("galerie-home.php"); ?> <!-- Menu bar with home pictures -->
<br/>
<?php include("login/config.php"); ?> <!-- open database, do not forget to mysqli_close($mysqli); when done with -->


<?php
$user=$_SESSION['login_user'];
$result1 = mysqli_query($mysqli,"SELECT * FROM users WHERE users.Username='$user'");
echo "<table width='60%' style='margin-top:5%;' ><col width='50%'><col width='50%'>";
while($row = mysqli_fetch_array($result1))
  {
  echo "<tr><td align='left'> Hello " . $row['Firstname'] ." ". $row['Lastname'] . "</td></tr>";
  echo "<tr><td align='left'><div id='UsN'> Your username is ". $row['Username'] . "</div></td></tr>";
  echo "<tr><td align='left'><div id='Us'>To change it <form style='display:inline' method='POST'><input type='submit' value='click here' name='change'></div></form></td></tr>";
  if(isset($_POST['change'])){
?>
<script>
  var userName=  document.getElementById('UsN');
  var userName2=  document.getElementById('Us'); 
  userName.style.visibility = 'hidden';
  userName2.style.visibility = 'hidden';
            
</script>
<tr><td><form method="POST"><input type="text" name="new" onfocus="if (this.value == this.defaultValue) {this.value = '';}" onblur="if (this.value == '') {this.value = this.defaultValue;}" value="New username"><input type="submit" value="Change" name="change2"></form></td></tr>
<tr><td><p style="font-size:12px">Note that after changing your username you have to login again<p><td><tr>
<?php
}
  echo "<tr><td align='left'><div id='chP'>To change the password <form style='display:inline' method='POST'><input type='submit' value='click here' name='changePa'></form><div></td></tr>";
  }
?>
<?php
if(isset($_POST['changePa'])){
?>
<script>
  var continue_button = document.getElementById('chP');
  continue_button.style.visibility = 'hidden';  
  var userName=  document.getElementById('UsN');
  var userName2=  document.getElementById('Us'); 
  userName.style.visibility = 'visible';
  userName2.style.visibility = 'visible';
            
</script>
<tr><td><form method="POST" ><p valign="bottom">Old password</p></td><td><input type="password" name="oldPa" onfocus="if (this.value == this.defaultValue) {this.value = '';}" onblur="if (this.value == '') {this.value = this.defaultValue;}"></td></tr>
<tr><td>New password</td><td> <input type="password" name="newPa" onfocus="if (this.value == this.defaultValue) {this.value = '';}" onblur="if (this.value == '') {this.value = this.defaultValue;}"></td></tr>
<tr><td>Retype new password</td><td> <input type="password" name="renewPa" onfocus="if (this.value == this.defaultValue) {this.value = '';}" onblur="if (this.value == '') {this.value = this.defaultValue;}"></td></tr>
<tr><td><input type="submit" value="Change" name="changePa2"></form></td></tr>
<tr><td><p style="font-size:12px">Note that after changing your password you have to login again<p><td><tr>
<?php
}
?>
<?php
if(isset($_POST['change2'])){
$new=$_POST['new'];
$new2 = mysqli_query($mysqli,"UPDATE users SET Username='$new' WHERE users.Username='$user'");
$new3 = mysqli_query($mysqli,"UPDATE Command SET userName='$new' WHERE Command.userName='$user'");
$new4 = mysqli_query($mysqli,"UPDATE History SET userName='$new' WHERE History.userName='$user'");
session_destroy();
echo "<script>window.location.href = 'home.php';</script>";
}
if(isset($_POST['changePa2'])){
  $newPa=$_POST['newPa'];
  $rePa=$_POST['renewPa'];
  if($newPa==$rePa){
    $oldP=$_POST['oldPa'];
    $checkOld=mysqli_query($mysqli,"SELECT Password FROM users WHERE users.Username='$user'");
    while($old = mysqli_fetch_array($checkOld)){
      $oldPa=$old['Password'];
    }
    if($oldP==$oldPa){
    $newPa2 = mysqli_query($mysqli,"UPDATE users SET Password='$newPa' WHERE users.Password='$oldPa'");
    session_destroy();
    echo "<script>window.location.href = 'home.php';</script>";}
    else{
       echo "You entered wrong old password. please try again";
    }
  }else{
    echo "Passwords do not match, please try again";
   }
}
?>
<tr><td height="100" valign="bottom"><p id="pb">Products that you bought<p></td></tr><table>
<?php
$new4 = mysqli_query($mysqli,"SELECT products.Photo, History.Color, History.Size, products.Price FROM products, History WHERE History.ProductID=products.ProductID AND History.userName='$user'"); 
$num_rows = mysqli_num_rows($new4);
if($num_rows==0){
echo "<style type='text/css'>#pb{display:none;}</style>";
}
while($row = mysqli_fetch_array($new4))
  {
  echo "<table class='tables' width='30%'>";        
 echo "<tr><td valign='top' align='center'>"
     . '<img src="data:image/jpeg;base64,' . base64_encode($row['Photo']) . '" width="120" height="200">'
     . '</td></tr>';
  echo "<tr><td align='center'> Color: " . $row['Color'] . "</td></tr>";
  echo "<tr><td align='center'> Size: " . $row['Size'] . "</td></tr>";
  echo "<tr><td align='center'> Price: ". $row['Price'] . "</td></tr>";
  }
?>
</table>
</div>
</body>
</html>
<?php include("footer.php"); ?>
