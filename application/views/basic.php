<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
					"<tr><td><a href='Basic/user/" . $user->id . "'>" . $user->firstName . "</a></td>
					<td>" . $user->lastName . "</td>
					<td>" . $user->age . "</td>
					<td>" . $user->email . "</td>
					<td>" . $user->phone . "</td></tr>";
				}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>