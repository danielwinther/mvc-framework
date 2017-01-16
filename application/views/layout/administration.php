{% extends "base/base.php" %}

{% block content %}
<section class="col-md-12">
	<table class="table table-hover table-responsive">
		<h2>Administration</h2>
		<thead>
			<tr>
				<th>ID</th>
				<th>User name</th>
				<th>First name</th>
				<th>Last name</th>
				<th>Age</th>
				<th>Email</th>
				<th>Phone</th>
				{% if data['user'].roleId == 1 %}
				<th>Update</th>
				<th>Delete</th>
				{% endif %}
			</tr>
		</thead>
		<tbody>
			{% for user in data['userArray'] %}
			<tr>
				<td>#{{user.id}}</td>
				<td><a href='../Administration/user/{{user.id}}'>{{user.userName}}</a></td>
				<td>{{user.firstName}}</td>
				<td>{{user.lastName}}</td>
				<td>{{user.age}}</td>
				<td>{{user.email}}</td>
				<td>{{user.phone}}</td>
				{% if data['user'].roleId == 1 %}
				<td>
					<a class="btn btn-default btn-xs" href="../Administration/editUser/{{user.id}}">Update</a>
				</td>
				<td>
					<a class="btn btn-danger btn-xs" href="../Administration/deleteUser/{{user.id}}">Delete</a>
				</td>
				{% endif %}
			</tr>
			{% endfor %}
		</tbody>
	</table>
	{% if data['user'].roleId == 1 %}
	<div class="form-group">
		<button class="btn btn-default btn-block" data-toggle="collapse" data-target="#createUser">Create new user</button>
	</div>
	<form method="POST" action="../Administration/createUser" class="collapse" id="createUser">
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
			<select class="form-control" name="role">
				{% for role in data['roles'] %}
				<option value="{{role.id}}">{{role.roleName}}</option>
				{% endfor %}
			</select>
		</div>
		<div class="form-group">
			<input class="btn btn-primary btn-block" type="submit" name="submit" value="Create">
		</div>
	</form>
</section>
{% endif %}
{% endblock %}