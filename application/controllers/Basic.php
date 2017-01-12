<?php
use Mailgun\Mailgun;
use Twilio\Rest\Client;

class Basic extends BaseController {
	public function login() {
		echo $this->renderView('layout/login');
	}
	public function loginPost() {
		$user = $this->loadModel('Users');

		Auth::login($this->postInput('userName'), $this->postInput('password'));
		$user = Auth::user();
		if ($user) {
			Redirect::controller('Basic@index');
		}
		else {
			Auth::login();
			Redirect::controller('Basic@login');
		}
	}
	public function logout() {
		Auth::logout();

		Redirect::controller('Basic@login');
	}
	public function index() {
		$user = $this->loadModel('Users');

		echo $this->renderView('layout/index', ['user' => Auth::user()]);
	}

	public function returnString() {
		return 'daniel';
	}
	public function returnInt() {
		return 24;
	}
	public function redirectToUrl() {
		Redirect::url(__DIR__ . '/returnString');
	}
	public function redirectToController() {
		Redirect::controller('Basic');
	}
	public function returnParameter($parameter = '') {
		return $parameter;
	}
	public function returnTwoParameters($parameter1 = '', $parameter2 = '') {
		return $parameter1 . $parameter2;
	}
	public function returnJson() {
		$users = $this->loadModel('Users');
		$users = Users::all();
		$json = $this->convert('JSON', $users);

		print_r($json);
	}
	public function returnXml() {
		$array = [
		'name' => 'root',
		'value' => 'Test'
		];
		$xml = $this->convert('XML', $array);

		print_r($xml);
	}
	public function returnYaml() {	
		$users = $this->loadModel('Users');
		$array = [
		'user' => [
		'name' => 'daniel',
		'age' => 24
		],
		];
		$yaml = $this->convert('YAML', $array);

		print_r($yaml);
	}
}