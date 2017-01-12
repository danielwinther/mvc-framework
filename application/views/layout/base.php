<!DOCTYPE html>
<html>
<head>
	{% block head %}
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="/mvc-framework/public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/mvc-framework/public/css/bootstrap-theme.min.css">
	<script type="text/javascript" src="/mvc-framework/public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/mvc-framework/public/js/bootstrap.min.js"></script>
	<title>Basic</title>
	{% endblock %}
</head>
<body>
	<div class="container">
		{% block header %}
		<nav class="navbar navbar-default row">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="../Home/index">MVC Framework</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="../Home/index">Home</a></li>
						<li><a href="../Obituaries/index">Obituaries</a></li>
						<li><a href="../Administration/index">Administration</a></li>
						<li><a href="../Contact/index">Contact</a></li>
						<!-- <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
							</ul>
						</li> -->
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="../Login/logout">Logout</a></li>
					</ul>
				</div>
			</div>
		</nav>
		{% endblock%}
		{% block content %}{% endblock %}
		<div class="row">
			{% block footer %}
			<h5 class="pull-right"><em>&copy; Copyright {{'now'|date('Y')}}</em></h5>
			{% endblock %}
		</div>
	</div>
</body>
</html>