<?php include('header.php'); ?>
<div class="container">
	<div class="row">
		<div class="text-center">
<?php
function userAlreadyRegistered(){
	echo '<h1>You have already registered for the Party!</h1>';
	die();
}
function requestInsertError() {
	echo '<h1>Error occured! Try again</h1>';
}
$name = $_POST['name'];
$email = $_POST['email'];
$phone_no = $_POST['phone_no'];
$city = $_POST['city'];
$gender = $_POST['gender'];

$servername = "localhost";
$db_user = "shubham";
$db_pass = "password";
$dbname = "soiree";

$conn = new mysqli($servername, $db_user, $db_pass, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * from requests WHERE email='$email'";
$result = $conn->query($sql);
if($result->num_rows > 0) {
	userAlreadyRegistered();
}
$sql = "INSERT INTO requests(name,email,phone_no,city,gender) values('$name','$email', '$phone_no','$city', '$gender');";
if ($conn->query($sql) === TRUE) {
	echo '<h3>Thank You! Your request has been successfully saved.</h3><h3>The host will review and update you on request</h3>';
} else {
    requestInsertError();
}
?>
		</div>
	</div>
</div>

<?php include('footer.php'); ?>