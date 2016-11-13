<?php
class Basic extends BaseController {
	public function initializeData() {
		$user1 = $this->loadModel('User', ['id' => 1, 'firstName' => 'Daniel Winther', 'lastName' => 'Jensen', 'age' => 24, 'email' => 'daniel@mail.dk', 'phone' => '88888888']);

		$user2 = $this->loadModel('User', ['id' => 2, 'firstName' => 'Benjamin Elzamouri', 'lastName' => 'Jensen', 'age' => 20, 'email' => 'benjamin@mail.dk', 'phone' => '55555555']);
		$userArray = [];

		array_push($userArray, $user1);
		array_push($userArray, $user2);

		return $userArray;
	}

	public function index() {
		return $this->renderView('basic', ['userArray' => $this->initializeData()]);
	}
	public function user($id = '') {
		foreach ($this->initializeData() as $user ) {
			if ($user->getId() == $id) {
				return $this->renderView('basic_detail', ['user' => $user]);
			}
		}
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