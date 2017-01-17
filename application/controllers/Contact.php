<?php
use Mailgun\Mailgun;

class Contact extends BaseController {
	public function index() {
		$user = $this->loadModel('Users');
		$user = Auth::user();

		if ($user) {
			echo $this->renderView('layout/contact');
		}
		else {
			Redirect::controller('Login@index');
		}
	}
	public function sendMail() {
		$client = new Mailgun(MAILGUN_KEY);
		$domain = MAILGUN_DOMAIN;

		$client->sendMessage($domain,
			array('from'    => 'Mailgun Sandbox <postmaster@sandbox5c2500d99acf4cbfa26fa88a596a49bd.mailgun.org>',
				'to'      => 'danielwinther@hotmail.dk',
				'subject' => $this->postInput('subject'),
				'text'    => $this->postInput('message')));

		Redirect::controller('Contact@index');
	}
}