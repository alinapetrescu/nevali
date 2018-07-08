<!-- 
Contains the box managing:
* Welcoming message with login info
* Login/Logout and Search button
* Management of Dialog "popup" "windows" from login and search buttons
* But NOT: Login and logout process with global session variables (see login1.php)
-->
<?php include("login/logininfoboxDialogs.php"); ?>

<div id="loginfo">
			<?php include("login/logininfo.php"); ?><br/>
			<?php include("login/loginlogoutsearchbuttons.php"); ?>
</div>
