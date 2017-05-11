<?php
require 'core.inc.php';
require 'connect.inc.php';

$page = basename($current_file, '.'.pathinfo($current_file)['extension']);
?>

<nav id="header" class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <!--<a class="navbar-brand" href="index.php">UPAC Sound</a>-->
	</div>
	<div class="navbar-collapse collapse" style="text-align:center;">
	  <ul class="nav navbar-nav pull-left">
		<?php
			if(loggedIn()) {
				echo '<li><a href="">BLOG</a></li>';
				echo '<li><a href="">SHOWS</a></li>';
				echo '<li><a href="">ADMIN</a></li>';
			}
		?>
	  </ul>
	  <ul class="nav navbar-nav nav-center">
		<li class="<?php if($page == 'index'){echo 'active';} ?>"><a href="index.php">HOME</a></li>
		<li class="<?php if($page == 'services'){echo 'active';} ?>"><a href="services.php">SERVICES</a></li>
		<li class="<?php if($page == 'downloads'){echo 'active';} ?>"><a href="downloads.html">DOWLOADS</a></li>
		<li class="<?php if($page == 'terms'){echo 'active';} ?>"><a href="terms.php">TERMS & POLICIES</a></li>
		<li class="<?php if($page == 'bylaws'){echo 'active';} ?>"><a href="bylaws.php">BY LAWS</a></li>
		<li><a data-toggle="modal" data-target="#contactModal" href="#contactModal">CONTACT</a></li>
	  </ul>
	  <ul class="nav navbar-nav pull-right">
		<?php
			if(!loggedIn()) {
				if($page == "login") {
					echo '<li class="active"><a href="login.php">LOGIN</a></li>';
				} else {
					echo '<li><a href="login.php">LOGIN</a></li>';
				}
			} else {
				echo '<li><a href="logout.php">LOGOUT</a></li>';
			}
		?>
	  </ul>
	</div><!--/.nav-collapse -->
  </div>
</nav>

<!-- MODAL FOR CONTACT -->
<!-- Modal -->
<div class="modal fade" id="contactModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title" id="myModalLabel">Contact Us</h4>
	  </div>
	  <div class="modal-body">
			<div class="span9">
				<form id="contact-form" class="contact-form" action="#">
					<p class="contact-name">
						<input id="contact_name" type="text" placeholder="Full Name" value="" name="name" />
					</p>
					<p class="contact-email">
						<input id="contact_email" type="text" placeholder="Email Address" value="" name="email" />
					</p>
					<p class="contact-message">
						<textarea id="contact_message" placeholder="Your Message" name="message" rows="15" cols="40"></textarea>
					</p>
				</form>
			</div>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-danger form-btn" data-dismiss="modal">Send Email</button>
	  </div>
	</div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->