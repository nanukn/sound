<!DOCTYPE html>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/scripts.js"></script>
<html lang="en">
  <body style="padding-top: 90px">

    <!-- Fixed navbar -->
	<?php
		include 'nav.php';
	?>
	
	<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a <?php if(!isset($_GET['registering']) || $_GET['registering'] == 'false') {echo'class="active"';} ?> href="login.php?registering=false" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a <?php if(isset($_GET['registering']) && $_GET['registering'] == 'true') {echo'class="active"';} ?> href="login.php?registering=true" id="register-form-link">Register</a>
							</div>
							<?php
								if(isset($_GET['registering']) && $_GET['registering'] == 'true') {
									echo '<script type="text/javascript">',
										 'jQuery(document).ready(function() { $("#register-form").delay(100).fadeIn(100); $("#login-form").fadeOut(100); });',
										 '</script>'
									;
								}
							?>
						</div>
						<!--<hr>-->
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<?php
									include 'loginform.inc.php';
								?>
								<?php
									include 'register.php';
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php
		include 'footer.php';
	?>
	
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="assets/js/bootstrap.min.js"></script>
	
  </body>
</html>