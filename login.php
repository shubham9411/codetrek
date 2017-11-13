<?php include('header.php'); ?>
<div class="container">
	<div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">
		<form class="form-horizontal" action="" method="post" id="loginForm">
			<h1 class="text-center">Login Page</h1>
			<div class="form-group">
				<div class="">
					<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
				</div>
			</div>
			<div class="form-group">
				<div class="">
					<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
				</div>
			</div>
			<div class="form-group">
				<div class="checkbox">
					<label><input type="checkbox" name="remember"> Remember me</label>
				</div>
			</div>
			<div class="form-group text-center">
				<div class="">
					<button type="submit" class="btn btn-primary">Login</button>
				</div>
			</div>
		</form>
	</div>
</div>
<script>
	console.log('ddd');
	$( '#loginForm' ).submit(function( event ) {
		event.preventDefault();
		var email = $('#email').val();
		var pwd = $('#pwd').val();
		if( !email ){
			alert('Email Required!');
			return;
		}
		if( !pwd ){
			alert('Password Required!');
			return;
		}
		var data={
			email : email,
			pwd : pwd
		}
		$.ajax({
			url: 'http://soriee.dev/auth.php',
			type: 'POST',
			data: data,
			success: function(result){
				
			}
		});
	});
</script>
<?php include('footer.php'); ?>