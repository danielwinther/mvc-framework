{% extends "layout/base.php" %}

{% block content %}
<div class="row">
<h2>You are logged in as<em>: {{data['user'].userName}}</em></h2>
</div>
{% endblock %}