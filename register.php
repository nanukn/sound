<?php
require 'core.inc.php';
require 'connect.inc.php';

if(!loggedIn()) {
	if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_again']) && isset($_POST['firstname']) && isset($_POST['lastname'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password_again = $_POST['password_again'];
		$password_hash = md5($password);
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		
		if(!empty($username) && !empty($password) && !empty($password_again) && !empty($firstname) && !empty($lastname)) {
			if(strlen($username > 7) || strlen($firstname > 20) || strlen($lastname) > 20) {
				echo 'Please adhear to maxlength of fields.';
			} else {
				if($password != $password_again) {
					echo 'passwords dont match';
				} else {
					$query = "SELECT username FROM users WHERE username='$username'";
					$query_run = mysqli_query($conn, $query);
					if(mysqli_num_rows($query_run) == 1) {
						echo 'The username '.$username.' already exists.';
					} else {
						$query = "INSERT INTO users VALUES ('','".mysqli_real_escape_string($conn, $username)."','".mysqli_real_escape_string($conn, $password_hash)."','".mysqli_real_escape_string($conn, $firstname)."','".mysqli_real_escape_string($conn, $lastname)."','')";
						if($query_run = mysqli_query($conn, $query)) {
							header('Location: register_success.php');
						} else {
							echo 'sorry, we were unable to register you at this time. Try again later.';
						}
					}
				}
			}
		} else {
			echo 'a field is empty';
		}
	}
?>
	<form action="register.php" method="POST">
		Username: <br><input type="text" name="username" maxlength="7" value="<?php if(isset($username)) { echo $username; } ?>"><br><br>
		Password: <br><input type="password" name="password"><br><br>
		Password again: <br><input type="password" name="password_again"><br><br>
		First name: <br><input type="text" name="firstname" maxlength="20" value="<?php if(isset($firstname)) { echo $firstname; } ?>"><br><br>
		Last name: <br><input type="text" name="lastname" maxlength="20" value="<?php if(isset($lastname)) { echo $lastname; } ?>"><br><br>
		<input type="submit" value="Register">
	</form>
<?php
} else if(loggedIn()) {
	echo 'you are registered';
}
?>