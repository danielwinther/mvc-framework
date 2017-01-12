{% extends "layout/base.php" %}

{% block content %}
<div class="row">
	<form method="POST" action="/mvc-framework/public/Administration/editUserPost">
		<div class="form-group">
			<input class="form-control" type="hidden" name="id" value="{{data['user'].id}}" placeholder="ID" required="">
		</div>
		<div class="row">
			<div class="form-group col-md-6">
				<input class="form-control input-sm" type="text" name="userName" value="{{data['user'].userName}}" placeholder="User name" required="">
			</div>
			<div class="form-group col-md-6">
				<input class="form-control input-sm" type="password" name="password" placeholder="Password" required="">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-5">
				<input class="form-control input-sm" type="text" name="firstName" value="{{data['user'].firstName}}" placeholder="First name" required="">
			</div>
			<div class="form-group col-md-5">
				<input class="form-control input-sm" type="text" name="lastName" value="{{data['user'].lastName}}" placeholder="Last name" required="">
			</div>
			<div class="form-group col-md-2">
				<input class="form-control input-sm" type="number" name="age" value="{{data['user'].age}}" placeholder="Age" min="0" max="100" required="">
			</div>
		</div>
		<div class="form-group">
			<input class="form-control input-sm" type="text" name="avatar" value="{{data['user'].avatar}}" placeholder="Avatar (URL)">
		</div>
		<div class="row">
			<div class="form-group col-md-6">
				<input class="form-control input-sm" type="email" name="email" value="{{data['user'].email}}" placeholder="Email" required="">
			</div>
			<div class="form-group col-md-6">
				<input class="form-control input-sm" type="tel" name="phone" value="{{data['user'].phone}}" placeholder="Phone" required="">
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
			<input class="btn btn-success btn-block" type="submit" name="submit" value="Save changes">
		</div>
	</form>
</div>
{% endblock %}