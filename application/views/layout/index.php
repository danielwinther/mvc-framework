{% extends "layout/base.php" %}

{% block content %}
<div class="row">
	<div class="col-md-8">
		<h2>You are logged in as<em>: {{data['user'].userName}} ({{data['user'].role.roleName}})</em></h2>
		<div class="well">
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam id massa pretium, sagittis lectus sed, euismod sem. Vestibulum sed purus eu ex semper consectetur. Mauris at convallis diam. Donec elementum massa et mauris bibendum, sit amet viverra quam maximus. Donec justo dolor, mollis et metus a, commodo porta orci.
			</p>
			<p>
				Integer libero purus, pulvinar eu magna at, semper ornare lorem. Nam purus velit, malesuada in mi nec, pretium congue nulla. Vivamus lacinia, tortor in interdum finibus, arcu enim ultricies erat, nec malesuada magna lorem ac urna. Nulla egestas metus mi, ac hendrerit felis hendrerit nec. Proin tincidunt magna sed velit cursus sollicitudin. Mauris luctus nisi vitae nisl finibus interdum. Cras vehicula dictum lectus at imperdiet. Nam ut placerat ex.
			</p>
			<p>
				Nam id risus semper, aliquet leo quis, ullamcorper lacus. Duis eleifend eu lorem eu laoreet. Interdum et malesuada fames ac ante ipsum primis in faucibus.
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam id massa pretium, sagittis lectus sed, euismod sem. Vestibulum sed purus eu ex semper consectetur. Mauris at convallis diam. Donec elementum massa et mauris bibendum, sit amet viverra quam maximus. Donec justo dolor, mollis et metus a, commodo porta orci.
			</p>
			<p>
				Nam id risus semper, aliquet leo quis, ullamcorper lacus. Duis eleifend eu lorem eu laoreet. Interdum et malesuada fames ac ante ipsum primis in faucibus.
			</p>
			<p>
				Integer libero purus, pulvinar eu magna at, semper ornare lorem. Nam purus velit, malesuada in mi nec, pretium congue nulla. Vivamus lacinia, tortor in interdum finibus, arcu enim ultricies erat, nec malesuada magna lorem ac urna. Nulla egestas metus mi, ac hendrerit felis hendrerit nec. Proin tincidunt magna sed velit cursus sollicitudin. Mauris luctus nisi vitae nisl finibus interdum. Cras vehicula dictum lectus at imperdiet. Nam ut placerat ex.
			</p>
		</div>
	</div>
	<div class="col-md-4">
		<h2>Two-factor</h2>
		<div class="form-group">
			<input type="text" class="form-control" value="{{data['user'].phone}}" name="phone" placeholder="Phone number" disabled>
		</div>
		<div class="form-group">
			<a class="btn btn-default btn-block" href="../Basic/sendTwoFactor">Send two-factor code</a>
		</div>
		<hr>
		<form action="../Index/verifyTwoFactor" method="POST">
			<div class="form-group">
				<input type="text" class="form-control" name="code" placeholder="Type two-factor verification code">
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-success btn-block" value="Verify two-factor code">
			</div>
		</form>

		{% if data['user'].isTwoFactor %}
		<div class="text-center">
			<h1 class="glyphicon glyphicon-ok text-success" aria-hidden="true"></h1>
		</div>
		{% endif %}
	</div>
</div>
{% endblock %}