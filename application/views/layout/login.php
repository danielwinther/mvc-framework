{% extends "base/base.php" %}

{% block content %}
<section class="row">
	{% block header %}
	{% endblock %}
	<h2>Login</h2>
	<form method="POST" action="loginPost">
		<div class="row">
			<div class="form-group col-md-6">
				<input class="form-control" type="text" name="userName" placeholder="User name" required="">
			</div>
			<div class="form-group col-md-6">
				<input class="form-control" type="password" name="password" placeholder="Password" required="">
			</div>
		</div>
		<div class="form-group">
			<input class="btn btn-primary btn-block" type="submit" name="login" value="Login">
		</div>
	</form>
	{% block footer %}
	{% endblock %}
</section>
{% endblock %}