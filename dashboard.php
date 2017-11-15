<?php include('header-admin.php'); ?>
<div class="container">
	<div class="row">
		<?php
		$servername = "localhost";
		$db_user = "shubham";
		$db_pass = "password";
		$dbname = "soiree";
		global $conn;
		$conn = new mysqli($servername, $db_user, $db_pass, $dbname);
		function printErrorMessage(){
			echo '<h1>Invalid Credentials</h1>';
			echo '<a href="/login.php" class="btn btn-default">Login again!</a>';
			die();
		}
		function printNoRequests(){
			echo '<h1>No Requests available yet</h1>';
			die();
		}

		function login() {
			$username = isset($_POST['username'])? $_POST['username'] : '';
			$password = isset($_POST['pwd'])? $_POST['pwd'] : '';
			global $conn;
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
					$_SESSION['is_user_logged_in'] = true;
					$_SESSION['user'] = $username;
					echo "<h1>Welcome " . ucwords($username) . "</h1>";
				} else {
					printErrorMessage();
				}
			}
			
		}
		function update(){
			global $conn;
			$email = $_POST['email'];
			$status = $_POST['status'];
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			$sql = "UPDATE requests SET status='$status' where email='$email'";
			if ($conn->query($sql) === TRUE) {
				echo "<h3>Request updated!</h3>";
			} else {
				echo "<h1>Error updating record: " . $conn->error . "</h1>";
				die();
			}
		}
		
		session_start();
		if(isset($_SESSION['is_user_logged_in'])){
			echo "<h1>Welcome " . ucwords($_SESSION['user']) . "</h1>";
			if(isset($_POST['update']) && $_POST['update'] == 'true' ){
				update();
			}
		} else{
			if(isset($_POST['username'])){
				login();
			} else{
				header('Location: /login.php');
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
									<form action="dashboard.php" method="post" accept-charset="utf-8">
										<input type="hidden" value="<?php echo $row['email'];?>" name="email">
										<input type="hidden" value="true" name="update">
										<button type="submit" value="1" class="btn btn-success" name="status">Accept</button>
										<button type="submit" value="0"  class="btn btn-danger"name="status">Reject</button>
									</form>
									<?php
									} else{ ?>
										<?php if($row['status'] == 0) { echo '<span class="label label-danger">Rejected</span>';}?>
										<?php if($row['status'] == 1) { echo '<span class="label label-success">Accepted</span>';}?>
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