{% extends "basic_base.php" %}

{% block head %}
{{ parent() }}
{% endblock %}
{% block content %}
<table class="table table-hover table-responsive row">
	<h2 class="row">Showcases user models</h2>
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
{% endblock %}