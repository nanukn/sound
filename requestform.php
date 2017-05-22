<html lang="en">
	<body>
		<!-- Fixed navbar -->
		<?php
			include 'nav.php';
		?>
		
		<!-- Footer -->
		<?php
			include 'footer.php';
		?>
	</body>
</html>

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