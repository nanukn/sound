<?php
require 'connect.inc.php';

if(!loggedIn()) {
	if(isset($_POST['rcs']) && isset($_POST['pass']) && isset($_POST['confirm-password'])) {
		$rcs = $_POST['rcs'];
		$pass = $_POST['pass'];
		$pass_again = $_POST['confirm-password'];
		$password_hash = md5($pass);
		
		if(!empty($rcs) && !empty($pass) && !empty($pass_again)) {
			if(strlen($rcs > 7)) {
				$msg = 'Please adhear to maxlength of fields.';
			} else {
				if($pass != $pass_again) {
					$msg = 'passwords dont match';
				} else {
					//search for existing users
					$query = "SELECT username FROM users WHERE username='$rcs'";
					$query_run = mysqli_query($conn, $query);
					if(mysqli_num_rows($query_run) == 1) {
						$msg = 'The username '.$rcs.' already exists.';
					} else {
						//add to database
						$query = "INSERT INTO users VALUES ('','".mysqli_real_escape_string($conn, $rcs)."','".mysqli_real_escape_string($conn, $password_hash)."','".mysqli_real_escape_string($conn, $firstname)."','".mysqli_real_escape_string($conn, $lastname)."','')";
						if($query_run = mysqli_query($conn, $query)) {
							header('Location: login.php?registering=false&registered=true');
						} else {
							$msg = 'sorry, we were unable to register you at this time. Try again later.';
						}
					}
				}
			}
		} else {
			$msg = 'a field is empty';
		}
	}
?>
	<!--
	<form action="register.php" method="POST">
		Username: <br><input type="text" name="username" maxlength="7" value="<?php if(isset($username)) { echo $username; } ?>"><br><br>
		Password: <br><input type="password" name="password"><br><br>
		Password again: <br><input type="password" name="password_again"><br><br>
		First name: <br><input type="text" name="firstname" maxlength="20" value="<?php if(isset($firstname)) { echo $firstname; } ?>"><br><br>
		Last name: <br><input type="text" name="lastname" maxlength="20" value="<?php if(isset($lastname)) { echo $lastname; } ?>"><br><br>
		<input type="submit" value="Register">
	</form>
	-->
	<form id="register-form" action="login.php?registering=true" method="post" role="form" style="display: none;">
		<?php
		if(isset($msg) && $msg != '') {
			echo '<div class="text-center">
					<label><font color="red">'.$msg.'</font></label>
				  </div>';
		}
		?>
		<div class="form-group">
			<input type="text" name="rcs" tabindex="1" class="form-control" placeholder="RCS ID" value="">
		</div>
		<div class="form-group">
			<input type="password" name="pass" tabindex="2" class="form-control" placeholder="Password">
		</div>
		<div class="form-group">
			<input type="password" name="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
				</div>
			</div>
		</div>
	</form>
<?php
} else if(loggedIn()) {
	$msg = 'you are registered';
}
?>