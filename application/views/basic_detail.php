<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<title>Basic View - detail</title>
</head>
<body>
	<div class="container">
		<h1 class="row">Showcases user model</h1>
		<hr class="row">
		<div class="panel panel-info row">
			<div class="panel-heading"><?php echo $data['user']->getFirstName(); ?></div>
			<div class="panel-body">
				<ul class="list-group">
					<li class="list-group-item"><strong>Name:</strong> <?php echo $data['user']->getFirstName() . ' ' . $data['user']->getLastName(); ?></li>
					<li class="list-group-item"><strong>Age:</strong> <?php echo $data['user']->getAge(); ?></li>
					<li class="list-group-item"><strong>Email:</strong> <?php echo $data['user']->getEmail(); ?></li>
					<li class="list-group-item"><strong>Phone:</strong> <?php echo $data['user']->getPhone(); ?></li>
				</ul>
			</div>
		</div>
		<a href="/mvc-framework/public/Basic/index" class="btn btn-primary btn-block">
		<span class="glyphicon glyphicon-arrow-left"></span> Return to list of users
		</a>
	</div>
</body>
</html>