{% extends "layout/basic_base.php" %}

{% block content %}
<div class="row">
	<h2>Showcases user edit model</h2>
	<form method="POST" action="/mvc-framework/public/Basic/editUserPost">
		<div class="form-group">
			<input class="form-control" type="hidden" name="id" value="{{data['user'].id}}" placeholder="ID" required="">
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
			<input class="btn btn-success btn-block" type="submit" name="submit" value="Save changes">
		</div>
	</form>
</div>
{% endblock %}