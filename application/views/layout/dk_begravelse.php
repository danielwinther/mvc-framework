{% extends "base/base.php" %}

{% block content %}
<section class="col-md-12">
	<table class="table table-hover table-responsive">
		<h2>Prices</h2>
		<h3>DK Begravelse</h3>
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
				<td>{{product.find('span', 0).plaintext | default('Ingen tekst fundet')}}</td>
				<td>{{product.find('a', 0).title | default('Ingen tekst fundet')}}</td>
				<td><img width="150" class="img-thumbnail" src="http://www.dk-begravelse.dk/{{product.find('img', 0).src}}" alt="{{product.find('a', 0).title}}"></td>
			</tr>
			{% endfor %}
		</tbody>
	</table>
</section>
{% endblock %}