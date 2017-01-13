{% extends "layout/base.php" %}

{% block content %}
<div class="col-md-8">
	<h2>Contact us</h2>
	<div class="well clearfix">
		<form action="../Contact/sendMail" method="POST">
			<div class="form-group">
				<input type="text" class="form-control" name="subject" placeholder="Subject" required="">
			</div>
			<div class="form-group">
				<input type="email" class="form-control" name="email" placeholder="Email" required="">
			</div>
			<div class="form-group">
				<textarea class="form-control" rows="10" name="message" placeholder="Message" required=""></textarea>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-success pull-right" value="Send mail">
			</div>
		</form>
	</div>
</div>
<div class="col-md-4">
	<h2>Google Maps</h2>
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2247.7772830814106!2d12.522369316275695!3d55.71024298054204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4652523a12cd8907%3A0x2ac54872c94bf71d!2sDegnestavnen+15%2C+2400+K%C3%B8benhavn+NV!5e0!3m2!1sda!2sdk!4v1484251206124" width="100%" height="300" frameborder="0" allowfullscreen></iframe>
</div>
{% endblock %}