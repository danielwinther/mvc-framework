{% extends "basic_base.php" %}

{% block head %}
{{ parent() }}
{% endblock %}
{% block content %}
<div class="row">
	<h2>Showcases user models</h2>
	<table class="table table-hover table-responsive">
		<thead>
			<tr>
				<th>ID</th>
				<th>First name</th>
				<th>Last name</th>
				<th>Age</th>
				<th>Email</th>
				<th>Phone</th>
			</tr>
		</thead>
		<tbody>
			{% for user in data['userArray'] %}
			<tr>
				<td>#{{user.id}}</td>
				<td><a href='Basic/user/{{user.id}}'>{{user.firstName}}</a></td>
				<td>{{user.lastName}}</td>
				<td>{{user.age}}</td>
				<td>{{user.email}}</td>
				<td>{{user.phone}}</td>
			</tr>
			{% endfor %}
		</tbody>
	</table>
</div>
{% endblock %}