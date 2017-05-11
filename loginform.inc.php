<?php
if(isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$password_hash = md5($password);
	
	if(!empty($username) && !empty($password)) {
		$query = "SELECT id FROM users WHERE username='".mysqli_real_escape_string($conn, $username)."' AND password='".mysqli_real_escape_string($conn, $password_hash)."'";
		if($query_run = mysqli_query($conn, $query)) {
			$query_num_rows = mysqli_num_rows($query_run);
			if($query_num_rows == 0) {
				$message = 'Invalid username/password combination.';
			} else if($query_num_rows == 1) {
				echo $user_id = mysqli_fetch_assoc($query_run);
				$id = $user_id['id'];
				$_SESSION['user_id'] = $user_id;
				header('Location: index.php');
			}
		}
	} else {
		$message = 'You must enter a username and password.';
	}
}
?>

<form id="login-form" action="<?php echo $current_file; ?>" method="post" role="form" style="display: block;">
	<?php
	//var_dump($_POST);
	if(isset($message) && $message != '') {
		echo '<div class="text-center">
				<label><font color="red">'.$message.'</font></label>
			  </div>';
	}
	?>
	
	<div class="input-group">
		<span class="input-group-addon" style="background-color:#2d2d2d; color:white;"><span class="glyphicon glyphicon-user"></span></span>
		<input style="margin-left:1px;" type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
	</div>
	<div class="input-group" style="padding-top: 5px">
		<span class="input-group-addon" style="background-color:#2d2d2d; color:white;"><span class="glyphicon glyphicon-lock"></span></span>
		<input style="margin-left:1px;" type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
	</div>
	<div class="form-group" style="padding-top: 15px">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-lg-12">
				<div class="text-center">
					<a href="#" tabindex="5" class="forgot-password">Forgot Password?</a>
				</div>
			</div>
		</div>
	</div>
</form>