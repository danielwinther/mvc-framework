{% extends "base/base.php" %}

{% block content %}
<section class="col-md-12">
	<div class="panel panel-info">
		<div class="panel-heading">{{data['user'].userName}}</div>
		<div class="panel-body">
			<ul class="list-group col-md-10">
				<li class="list-group-item"><strong>Name:</strong> {{data['user'].firstName}} {{data['user'].lastName}}</li>
				<li class="list-group-item"><strong>Age:</strong> {{data['user'].age}}</li>
				<li class="list-group-item"><strong>Email:</strong> {{data['user'].email}}</li>
				<li class="list-group-item"><strong>Phone:</strong> {{data['user'].phone}}</li>
				<li class="list-group-item"><strong>Role:</strong> {{data['user'].role.roleName}}</li>
			</ul>
			<img class="img-responsive col-md-2" src="{{data['user'].avatar}}" alt="{{data['user'].firstName}}">
		</div>
	</div>
	<div>
		<a href="/mvc-framework/public/Administration/index" class="btn btn-default btn-lg btn-block">
			<span class="glyphicon glyphicon-arrow-left"></span> Return to list of users
		</a>
	</div>
</section>
{% endblock %}