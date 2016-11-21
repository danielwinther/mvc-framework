<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap-theme.min.css">
	<script type="text/javascript" src="../public/js/jquery.min.js"></script>
	<script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
	<title>Basic</title>
</head>
<body>
	<div class="container">
		<table class="table table-hover table-responsive row">
			<h1 class="row">Showcases user model</h1>
			<hr class="row">
			<thead>
				<tr>
					<th>First name</th>
					<th>Last name</th>
					<th>Age</th>
					<th>Email</th>
					<th>Phone</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($data['userArray'] as $user) {
					echo 
					"<tr><td><a href='Basic/user/" . $user->getId() . "'>" . $user->getFirstName() . "</a></td>
					<td>" . $user->getLastName() . "</td>
					<td>" . $user->getAge() . "</td>
					<td>" . $user->getEmail() . "</td>
					<td>" . $user->getPhone() . "</td></tr>";
				}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>