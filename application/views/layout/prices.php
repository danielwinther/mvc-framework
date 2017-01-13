{% extends "base/base.php" %}

{% block content %}
<div class="col-md-12">
	<table class="table table-hover table-responsive">
		<h2>Prices</h2>
		<h3>BedreBegravelse.dk</h3>
		<thead>
			<tr>
				<th>Type & price</th>
				<th>Description</th>
				<th>Image</th>
			</tr>
		</thead>
		<tbody>
			{% for product in data['html'] %}
			<tr>
				<td>{{product.find('p', 0).plaintext | default('Ingen tekst fundet')}}</td>
				<td>{{product.find('a', 0).getAttribute('title') | default('Ingen tekst fundet')}}</td>
				<td><img width="150" class="img-thumbnail" src="https://www.bedrebegravelse.dk/{{product.find('img', 0).src}}" alt="{{product.find('a', 0).getAttribute('title')}}"></td>
			</tr>
			{% endfor %}
		</tbody>
	</table>
</div>
{% endblock %}