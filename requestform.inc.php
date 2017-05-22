<form id="login-form" action="<?php echo $current_file; ?>" method="post" role="form" style="display: block;">
	
	<div class="form-group row">
		<div class="col-sm-5">
			<input type="text" name="event_name" class="form-control" placeholder="Event Title" value="">
		</div>
		<div class="col-sm-5">
			<input type="text" name="organization" class="form-control" placeholder="Organization" value="">
		</div>
		<div class="col-sm-2">
			<div class="form-check">
				<label class="form-check-label">
					<input type="checkbox" name="union_funded" class="form-check-input" value="union_funded">
					Union-funded
				</label>
			</div>
		</div>
	</div>
	
	<div class="form-group row">
		<div class="col-sm-4">
			<input type="text" name="venue" class="form-control" placeholder="Venue/Location" value="">
		</div>
		<div class="col-sm-4">
			<input type="text" name="est_attendance" class="form-control" placeholder="Estimated Attendace" value="">
		</div>
		<div class="col-sm-4">
			<input type="text" name="website" class="form-control" placeholder="Website" value="">
		</div>
	</div>
	
	<div class="form-group row">
		<div class="col-sm-2">
			<label class="form-label">Start Date</label>
			<input class="form-control" type="date" value="2011-08-19">
			<label class="form-label">End Date</label>
			<input class="form-control" type="date" value="2011-08-19">
		</div>
		
		<div class="col-sm-2">
			<label class="col-form-label">Start time</label>
				<input class="form-control" type="time" value="13:45:00">
				<label class="col-form-label">End time</label>
				<input class="form-control" type="time" value="13:45:00">
		</div>
		<div class="col-sm-2">
			<label class="col-form-label">Sound check time</label>
				<input class="form-control" type="time" value="13:45:00">
		</div>
		<div class="col-sm-6">
			<label>------------------------------------Description here-------------------------------------</label>
		</div>
	</div>
	
	<div class="form-group row">
		<div class="col-sm-3">
			<label class="form-check-label">
				<input class="form-check-input" type="radio" name="requestOptions" value="rental"> Rental
			</label>
		</div>
		<div class="col-sm-3">
			<label class="form-check-label">
				<input class="form-check-input" type="radio" name="requestOptions" value="a_rig"> A-Rig
			</label>
		</div>
		<div class="col-sm-3">
			<label class="form-check-label">
				<input class="form-check-input" type="radio" name="requestOptions" value="b_rig"> B-Rig
			</label>
		</div>
		<div class="col-sm-3">
			<label class="form-check-label">
				<input class="form-check-input" type="radio" name="requestOptions" value="c_rig"> C-Rig
			</label>
		</div>
	</div>
	
	<label class="form-check-label">
		<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"> 1
	</label>
	<label class="form-check-label">
		<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2"> 2
	</label>
	
	
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