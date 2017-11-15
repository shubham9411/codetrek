<?php include('header-admin.php'); ?>
<div class="container">
	<div class="row">
		<?php
		function printErrorMessage(){
			echo '<h1>Invalid Credentials</h1>';
			echo '<a href="/login.php" class="btn btn-default">Login again!</a>';
			die();
		}
		function printNoRequests(){
			echo '<h1>No Requests available yet</h1>';
			die();
		}
		$username = $_POST['username'];
		$password = $_POST['pwd'];

		$servername = "localhost";
		$db_user = "shubham";
		$db_pass = "password";
		$dbname = "soiree";

		$conn = new mysqli($servername, $db_user, $db_pass, $dbname);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		$sql = "SELECT * FROM users WHERE username='$username'";
		$result = $conn->query($sql);
		if($result->num_rows <= 0) {
			printErrorMessage();
		}
		while($row = $result->fetch_assoc()) {
			if($row['username'] == $username && $row['password'] == $password) {
				echo "<h1>Welcome " . ucwords($username) . "</h1>";
			} else {
				printErrorMessage();
			}
		}
		$sql = "SELECT * FROM requests";
		$result = $conn->query($sql);
		?>
		<div class="text-center"><h3>All Requests</h3></div>
		<div class="container">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Phone Number</th>
						<th>City</th>
						<th>Gender</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if($result->num_rows <= 0) {
							printNoRequests();
						}
						while($row = $result->fetch_assoc()) { ?>
							<tr>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['phone_no']; ?></td>
							<td><?php echo $row['city']; ?></td>
							<td><?php echo $row['gender']; ?></td>
							<td>
								<?php
									if( is_null($row['status'])){ ?>
										<a class="btn btn-success">Accept</a>
										<a class="btn btn-danger">Reject</a>
									<?php
									} else{ ?>
										<?php if($row['status'] == 0) { echo '<span class="label label-primary">Rejected</span>';}?>
										<?php if($row['status'] == 1) { echo '<span class="label label-primary">Accepted</span>';}?>
									<?php
									}
									?>
							</td>
						</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include('footer.php'); ?>