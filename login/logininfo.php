<?php if(isset($_SESSION['user_type']) && ($_SESSION['user_type']=="user" || $_SESSION['user_type']=="admin"))
				{		echo 'You are logged in as '.$_SESSION['user_type'].' "'.$_SESSION['login_user'].'".<br/>';
				}
				elseif(isset($_POST['userid'])) //page loaded from unsuccessfull login attempt
				{
						echo 'Invalid username or password.<br/> Please 
						<a href="javascript:showLoginDialogOnly();">try again</a>
						or 
						<a href="javascript:showRegisterOnly();">register</a>.<br/>';
						//function return false
						$Shakeopenlogin=true;
				}
				else
				{// cas d'un visiteur
						echo 'You are actually a '.$_SESSION['user_type'].'.<br/> Please log in or 
						<a href="javascript:showRegisterOnly();">register</a>.<br/>';
						//function return false
				}
					
					//echo $_SESSION['login_user'];
					//echo $_SESSION['user_type'];
					//echo '---';
					//echo $userid;
					//echo $password;
					//echo $_SESSION['IP'];
					//echo $_SERVER['REMOTE_ADDR'];
			?>
