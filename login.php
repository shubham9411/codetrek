<?php include('header.php'); ?>
<div class="container">
	<div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">
		<form class="form-horizontal" action="dashboard.php" method="post" id="loginForm">
			<h1 class="text-center">Login Page</h1>
			<div class="form-group">
				<div class="">
					<input type="text" class="form-control" placeholder="Enter username" name="username" required>
				</div>
			</div>
			<div class="form-group">
				<div class="">
					<input type="password" class="form-control" placeholder="Enter password" name="pwd" required>
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
<?php include('footer.php'); ?>