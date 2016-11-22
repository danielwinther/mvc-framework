<?php
class Basic extends BaseController {
	public function index() {
		$users = $this->loadModel('Users');
		$users = Users::all();

		return $this->renderView('basic', ['userArray' => $users]);
	}
	public function user($id = '') {
		$user = $this->loadModel('Users');
		$user = Users::find($id);

		return $this->renderView('basic_detail', ['user' => $user]);
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
}