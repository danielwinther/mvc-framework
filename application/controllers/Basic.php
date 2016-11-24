<?php
class Basic extends BaseController {
	public function index() {
		$users = $this->loadModel('Users');
		$users = Users::all()->sortBy("firstName");

		echo $this->renderView('basic', ['userArray' => $users]);
	}
	public function user($id = '') {
		$user = $this->loadModel('Users');
		$user = Users::find($id);

		echo $this->renderView('basic_detail', ['user' => $user]);
	}

	public function returnModel() {
		$user = $this->loadModel('User');
		$user->setFirstName('daniel');

		return $user;
	}
	public function returnString() {
		return 'daniel';
	}
	public function returnInt() {
		return 24;
	}
	public function returnParameter($parameter = '') {
		return $parameter;
	}
	public function returnSeveralParameters($parameter1 = '', $parameter2 = '') {
		return $parameter1 + $parameter2;
	}
}