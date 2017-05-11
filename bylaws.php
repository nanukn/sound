<!DOCTYPE html>
<html lang="en">
  <body>
	<!-- Fixed navbar -->
	<?php
		include 'nav.php';
	?>
	
	<div class="row-container" style="position: absolute; top: 70px; bottom: 85px; width: 100%;">
		<object data="assets/files/bylaws.pdf" type="application/pdf" width="100%" height="100%">
			<iframe src="assets/files/bylaws.pdf" width="100%" height="100%" style="border: none;">
				This browser does not support PDFs. Please download the PDF to view it: <a href="assets/files/bylaws.pdf">Download PDF</a>
			</iframe>
		</object>
	</div>
	
	<!-- Footer -->
	<?php
		include 'footer.php';
	?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	<!-- <script src="assets/js/scripts.js"></script> -->
  </body>
</html>