		<div class="content">
			<p>Please login first!</p>
			<?php
				if(isset($_SESSION['user_type'])=="visitor" && isset($_SESSION['logintried']))
					{
						echo "<div class='error'><p>Username or password are invalid. Please try again.</p></div>";
					}
			?>
			<div class="login">
				<h2>login</h2>
				<form method="POST">
					<div>
						<label for="Username">Username</label><br/>
						<input type="text" name="userid" id="userid"/>
					</div>
					<div>
						<label for="Password">Password</label><br/>
						<input type="password" name="password" id="password"/>
					</div>
					<div>
						<input type="Submit" value="Login"> OR 
						<a style="color:yellow;" href="javascript:showRegisterOnly();">register</a>
					</div>
				</form>
			</div>
		</div>

