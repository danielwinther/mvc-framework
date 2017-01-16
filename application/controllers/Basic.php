<?php
class Basic extends BaseController {
	public function returnModel() {
		$user = $this->loadModel('User');
		$user->setFirstName('daniel');
		return $user;
	}
	public function returnHash() {
		return Hash::create('daniel', PASSWORD_BCRYPT, SALT);
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