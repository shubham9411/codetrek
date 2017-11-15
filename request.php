<?php 
session_start();
if(isset($_SESSION['is_user_logged_in'])) {
	include('header-admin.php');
} else{
	include('header.php');
}
?>
<div class="container">
	<div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">
		<form class="form-horizontal" action="thank-you.php" method="post" id="inviteForm">
			<h1 class="text-center">Request An Invite</h1>
			<div class="form-group">
				<div class="">
					<input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
				</div>
			</div>
			<div class="form-group">
				<div class="">
					<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
				</div>
			</div>
			<div class="form-group">
				<div class="">
					<input type="number" class="form-control" id="phone_no" placeholder="Enter phone number" name="phone_no" required>
				</div>
			</div>
			<div class="form-group">
				<div class="">
					<input type="text" class="form-control" id="city" placeholder="Enter city" name="city" required>
				</div>
			</div>
			<div class="form-group row">
				<div>
					<label class="radio-inline" for="gender"><b>Gender</b></label>
					<label class="radio-inline"><input type="radio" value="Male" name="gender" checked>Male</label>
					<label class="radio-inline"><input type="radio" value="Female" name="gender">Female</label>
				</div>
			</div>
			<div class="form-group text-center">
				<div class="">
					<button type="submit" class="btn btn-primary">Request Invitation</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php include('footer.php'); ?>