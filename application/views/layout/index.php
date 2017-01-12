{% extends "layout/base.php" %}

{% block content %}
<div class="row">
	<div class="col-md-6">
		<h2>You are logged in as<em>: {{data['user'].userName}}</em></h2>
	</div>
	<div class="col-md-6">
		
	</div>
</div>
{% endblock %}