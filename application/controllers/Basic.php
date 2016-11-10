<?php
class Basic extends BaseController {
	public function index() {
		$user1 = $this->loadModel('User');
		$user1->setFirstName('Daniel Winther');
		$user1->setLastName('Jensen');
		$user1->setAge(24);
		$user1->setEmail('daniel@mail.dk');
		$user1->setPhone('88888888');

		$user2 = $this->loadModel('User');
		$user2->setFirstName('Benjamin Elzamouri');
		$user2->setLastName('Jensen');
		$user2->setAge(20);
		$user2->setEmail('benjamin@mail.dk');
		$user2->setPhone('12345678');


		$userArray = [];
		array_push($userArray, $user1);
		array_push($userArray, $user2);

		return $this->renderView('basic', ['userArray' => $userArray]);
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