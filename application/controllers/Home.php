<?php
use Twilio\Rest\Client;

class Home extends BaseController {
	public function index() {
		$user = $this->loadModel('Users');
		$this->loadModel('Roles');
		$user = Auth::user();

		if ($user) {
			echo $this->renderView('layout/home', ['user' => $user]);
		}
		else {
			Redirect::controller('Login@index');
		}
	}
	public function sendTwoFactor() {
		$user = $this->loadModel('Users');
		Auth::sendTwoFactor();

		Redirect::controller('Login@index');
	}
	public function verifyTwoFactor() {
		$user = $this->loadModel('Users');
		Auth::verifyTwoFactor($this->postInput('code'));

		Redirect::controller('Login@index');
	}
}