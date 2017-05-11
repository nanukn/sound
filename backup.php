<form id="loginForm" role="form" class="form-signin" action="<?php echo $current_file; ?>" method="POST">
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
		<input style="margin-left:1px;" class="form-control" maxlength="30" name="username" placeholder="Username" type="text" />
	</div>
	
	<div class="input-group" style="padding-top:5px;">
		<span class="input-group-addon" style="background-color:#2d2d2d; color:white;"><span class="glyphicon glyphicon-lock"></span></span>
		<input style="margin-left:1px; margin-bottom:0;" class="form-control" maxlength="30" name="password" placeholder="Password" type="password" /> 
	</div>
	
	<button id="login" type="submit" class="btn btn-default btn-success btn-block form-btn"> Login</button>
</form>

<!--
<form action="<?php //echo $current_file; ?>" method="POST">
Username: <input type="text" name="username">
Password: <input type="password" name="password">
<input type="submit" value="Log in">
</form>
-->

<li class="<?php if($page == 'login'){echo 'active';} ?>"><a href="login.php">LOGIN</a></li>

<!-- MODAL FOR LOGIN -->
<!-- Modal -->
<?php
	if(isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		//echo "<script type='text/javascript'>alert('$username');</script>";
		
		$password_hash = md5($password);
		
		if(!empty($username) && !empty($password)) {
			$query = "SELECT id FROM users WHERE username='".mysqli_real_escape_string($conn, $username)."' AND password='".mysqli_real_escape_string($conn, $password_hash)."'";
			if($query_run = mysqli_query($conn, $query)) {
				$query_num_rows = mysqli_num_rows($query_run);
				if($query_num_rows == 0) {
					$message = 'Invalid username/password combination.';
				} else if($query_num_rows == 1) {
					$user_id = mysqli_fetch_assoc($query_run);
					$id = $user_id['id'];
					$_SESSION['user_id'] = $user_id;
					header('Location: index.php');
				}
			}
		} else {
			//'Please enter a username and password.'
			$message = 'Please enter a username and password.';
		}
		//check this
		//$_POST = array();
	} else {
		$message = 'not set';
	}
	
?>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title" style="text-align: center; font-size: 30px;" id="myModalLabel">LOGIN</h4>
	  </div>
	  <div class="modal-body">
			<?php include 'loginform.inc.php'; ?>
	  </div>
	  <div class="modal-footer">
		<div class="form-group" style="margin-bottom: 0px;">
			<p style="margin-bottom: 0px;">Not a member? <a href="#">Sign Up</a>
			<br><a href="#">Forgot Password?</a></p>
		</div>
	  </div>
	</div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--
<div class="modal-content">
  <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title" style="text-align: center; font-size: 30px;" id="myModalLabel">LOGIN</h4>
  </div>
  <div class="modal-body">
		<?php //include 'loginform.inc.php'; ?>
  </div>
  <div class="modal-footer">
	<div class="form-group" style="margin-bottom: 0px;">
		<p style="margin-bottom: 0px;">Not a member? <a href="#">Sign Up</a>
		<br><a href="#">Forgot Password?</a></p>
	</div>
  </div>
</div>
-->

<?php
/*
if(loggedIn()) {
	echo 'You are logged in. <a href="logout.php"> log out </a><br>';
	echo getUserField('username');
} else {
	include 'loginform.inc.php';
}
*/
?>

<script>
	$("#loginn").submit(function() {
		$("#loginForm").find('input[type="text"], input[type="password"]').each(function() {
			if($(this).val() == "") {
				return false;
			}
		});
		window.location.replace(window.location);
	});
	
    /*
        Form validation
    */
	/*
	$('.form-signin input[type="text"], .form-signin input[type="password"], .form-signin textarea').on('focus', function() {
    	$(this).removeClass('input-error');
    });
    
    $('.form-signin').on('submit', function(e) {
    	$(this).find('input[type="text"], input[type="password"], textarea').each(function(){
			e.preventDefault();
			$('#loginModal').modal('show');
			if( $(this).val() == "" ) {
    			e.preventDefault();
    			$(this).addClass('input-error');
				
    		}
    		else {
    			$(this).removeClass('input-error');
				$("#loginFormm").submit();
    		}
			
    	});
		
		$("#loginModal").on("shown.bs.modal",function(){
		   $(this).hide().show();
		});
    	
    });
	*/
	
	/*
	var values = $(this).serialize();
	$.ajax({
		url: "index.php",
		type: "post",
		data: values ,
		success: function (response) {
		   alert(values);
		},
		error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});
	*/
    
	// Variable to hold request
	var request;

	// Bind to the submit event of our form
	$("#loginFormm").submit(function(event){

		// Prevent default posting of form - put here to work in case of errors
		event.preventDefault();
		$('#loginModal').modal('show');

		// Abort any pending request
		if (request) {
			request.abort();
		}
		// setup some local variables
		var $form = $(this);

		// Let's select and cache all the fields
		var $inputs = $form.find("input, select, button, textarea");

		// Serialize the data in the form
		var serializedData = $form.serialize();

		// Let's disable the inputs for the duration of the Ajax request.
		// Note: we disable elements AFTER the form data has been serialized.
		// Disabled form elements will not be serialized.
		$inputs.prop("disabled", true);

		// Fire off the request to /form.php
		request = $.ajax({
			url: "../../index.php",
			type: "post",
			data: serializedData
		});

		// Callback handler that will be called on success
		request.done(function (response, textStatus, jqXHR){
			// Log a message to the console
			console.log(serializedData);
		});

		// Callback handler that will be called on failure
		request.fail(function (jqXHR, textStatus, errorThrown){
			// Log the error to the console
			console.error(
				"The following error occurred: "+
				textStatus, errorThrown
			);
		});

		// Callback handler that will be called regardless
		// if the request failed or succeeded
		request.always(function () {
			// Reenable the inputs
			$inputs.prop("disabled", false);
		});
		
		$("#loginModal").on("shown.bs.modal",function(){
		   $(this).hide().show();
		});

	});
</script>