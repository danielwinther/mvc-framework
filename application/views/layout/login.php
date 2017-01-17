{% extends "base/base.php" %}

{% block content %}
<section class="row">
	{% block header %}
	{% endblock %}
	<h2>Login</h2>
	<form method="POST" action="loginPost">
		<div class="row">
			<div class="form-group col-md-6">
				<input class="form-control" type="text	" name="userName" placeholder="User name" required="">
			</div>
			<div class="form-group col-md-6">
				<input class="form-control" type="password" name="password" placeholder="Password" required="">
			</div>
		</div>
		<div class="form-group">
			<input class="btn btn-primary btn-block" type="submit" name="login" value="Login">
		</div>
	</form>
	<div class="pull-right">
		<h5 class="text-right"><a href="#" data-toggle="modal" data-target="#createUserModal">Create new user</a></h5>
		<h5 class="text-right"><a href="#" data-toggle="modal" data-target="#forgottenPasswordModal">Forgotten your password?</a></h5>
	</div>
	{% block footer %}
	{% endblock %}
</section>
<div id="createUserModal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Create new user</h4>
			</div>
			<form method="POST" action="../Login/createUser">
				<div class="modal-body">
					<p>Type in your user credentials in the following inputs.</p>
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
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<input class="btn btn-primary" type="submit" name="submit" value="Create user">
				</div>
			</form>
		</div>
	</div>
</div>
<div id="forgottenPasswordModal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Forgotten your password?</h4>
			</div>
			<form method="POST" action="../Login/forgottenPassword">
				<div class="modal-body">
					<p>Type in your user name to obtain a new password via the registered email address.</p>
					<div class="form-group">
						<input class="form-control input-sm" type="text" name="userName" placeholder="User name" required="">
		
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<input class="btn btn-primary" type="submit" name="submit" value="Send new password">
				</div>
			</form>
		</div>
	</div>
</div>
{% endblock %}