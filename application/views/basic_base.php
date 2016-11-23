<!DOCTYPE html>
<html>
<head>
	{% block head %}
	<link rel="stylesheet" type="text/css" href="/mvc-framework/public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/mvc-framework/public/css/bootstrap-theme.min.css">
	<script type="text/javascript" src="/mvc-framework/public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/mvc-framework/public/js/bootstrap.min.js"></script>
	<title>Basic</title>
	{% endblock %}
</head>
<body>
	<div class="container">
		<div class="page-header row">
			<h1>MVC framework</h1>
		</div>
		{% block content %}{% endblock %}
		<div class="row">
			{% block footer %}
			<h5 class="pull-right"><em>&copy; Copyright {{'now'|date('Y')}}</em></h5>
			{% endblock %}
		</div>
	</div>
</body>
</html>