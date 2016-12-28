{% extends "layout/basic_base.php" %}

{% block content %}
<div class="row">
	<h2>Showcases user models</h2>
	<table class="table table-hover table-responsive">
		<thead>
			<tr>
				<th>ID</th>
				<th>User name</th>
				<th>First name</th>
				<th>Last name</th>
				<th>Age</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Update</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			{% for user in data['userArray'] %}
			<tr>
				<td>#{{user.id}}</td>
				<td><a href='Basic/user/{{user.id}}'>{{user.userName}}</a></td>
				<td>{{user.firstName}}</td>
				<td>{{user.lastName}}</td>
				<td>{{user.age}}</td>
				<td>{{user.email}}</td>
				<td>{{user.phone}}</td>
				<td>
					<a class="btn btn-default btn-xs" href="Basic/editUser/{{user.id}}">Update</a>
				</td>
				<td>
					<a class="btn btn-danger btn-xs" href="Basic/deleteUser/{{user.id}}">Delete</a>
				</td>
			</tr>
			{% endfor %}
		</tbody>
	</table>
	<form method="POST" action="Basic/createUser">
		<div class="row">
			<div class="form-group col-md-6">
				<input class="form-control input-sm" type="text" name="userName" placeholder="User name" required="">
			</div>
			<div class="form-group col-md-6">
				<input class="form-control input-sm" type="password" name="password" placeholder="Password" required="">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-5">
				<input class="form-control input-sm" type="text" name="firstName" placeholder="First name" required="">
			</div>
			<div class="form-group col-md-5">
				<input class="form-control input-sm" type="text" name="lastName" placeholder="Last name" required="">
			</div>
			<div class="form-group col-md-2">
				<input class="form-control input-sm" type="number" name="age" placeholder="Age" min="0" max="100" required="">
			</div>
		</div>
		<div class="form-group">
			<input class="form-control input-sm" type="text" name="avatar" placeholder="Avatar (URL)">
		</div>
		<div class="row">
			<div class="form-group col-md-6">
				<input class="form-control input-sm" type="email" name="email" placeholder="Email" required="">
			</div>
			<div class="form-group col-md-6">
				<input class="form-control input-sm" type="tel" name="phone" placeholder="Phone" required="">
			</div>
		</div>
		<div class="form-group">
			<input class="btn btn-primary btn-block" type="submit" name="submit" value="Create new user">
		</div>
	</form>
</div>
{% endblock %}