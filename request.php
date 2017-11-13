<?php include('header.php'); ?>
<div class="container">
	<div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">
		<form class="form-horizontal" action="" method="post" id="inviteForm">
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
					<input type="text" class="form-control" id="phone_no" placeholder="Enter phone number" name="phone_no" required>
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
					<label class="radio-inline"><input type="radio" value="M" name="gender" checked>Male</label>
					<label class="radio-inline"><input type="radio" value="F" name="gender">Female</label>
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
<div id="submit-modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body text-center">
				<h3>Thanks You! Your request has been successfully submitted!</h3>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<script>
	console.log('ddd');
	$( '#inviteForm' ).submit(function( event ) {
		event.preventDefault();
		var name = $('#name').val();
		var email = $('#email').val();
		var phone_no = $('#phone_no').val();
		var city = $('#city').val();
		var gender = $("input[name='gender']:checked").val()
		console.log()
		if( !name ){
			alert('Name Required!');
			return;
		}
		if( !email ){
			alert('Email Required!');
			return;
		}
		if( !phone_no ){
			alert('Phone Number Required!');
			return;
		}
		if( !city ){
			alert('City Required!');
			return;
		}
		var data={
			name : name,
			email : email,
			phone_no: phone_no,
			city : city,
			gender: gender
		}
		$.ajax({
			url: 'http://soriee.dev/auth.php',
			type: 'POST',
			data: data,
			success: function(result){
				$('#submit-modal').modal();
				
			}
		});
	});
$("#submit-modal").on('hidden.bs.modal', function () {
	window.location.href = "http://soriee.dev";
});
</script>
<?php include('footer.php'); ?>