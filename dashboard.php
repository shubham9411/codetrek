<?php include('header-admin.php'); ?>
<div class="container">
	<div class="row">
		<div class="text-center"><h3>All Requests</h3></div>
		<div class="container">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone Number</th>
						<th>City</th>
						<th>Gender</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">1</th>
						<td>Shubham Pandey</td>
						<td>shubham9411@gmail.com</td>
						<td>9756283293</td>
						<td>Ranikhet</td>
						<td>Male</td>
						<td>
							<button class="btn btn-success">Accept</button>
							<button class="btn btn-danger">Reject</button>
						</td>
					</tr>
					<tr>
						<th scope="row">2</th>
						<td>Rohit Juyal</td>
						<td>juli@gmail.com</td>
						<td>9751548256</td>
						<td>Roorkee</td>
						<td>Male</td>
						<td>
							<button class="btn btn-success">Accept</button>
							<button class="btn btn-danger">Reject</button>
						</td>
					</tr>
					<tr>
						<th scope="row">3</th>
						<td>Kaushal Pandey</td>
						<td>kaushal196@gmail.com</td>
						<td>8745623154</td>
						<td>Bageshwar</td>
						<td>Male</td>
						<td><b>Accepted</b></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include('footer.php'); ?>