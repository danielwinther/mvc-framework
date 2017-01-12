<?php
class Administration extends BaseController {
	public function index() {
		$users = $this->loadModel('Users');
		$user = Auth::user();

		if ($user) {
			$users = Users::all()->sortBy('firstName');
			echo $this->renderView('layout/administration', ['userArray' => $users]);
		}
		else {
			Redirect::controller('Login@index');
		}
	}
	public function user($id = '') {
		$user = $this->loadModel('Users');
		$users = $this->loadModel('Roles');
		$user = Auth::user();

		if ($user) {
			$user = Users::find($id);
			echo $this->renderView('layout/administration_detail', ['user' => $user]);
		}
		else {
			Redirect::controller('Login@index');
		}
	}
	public function createUser() {
		$postInput = $this->postInput();
		
		$user = $this->loadModel('Users');
		Users::create($postInput);
		
		Redirect::controller('Administration/index');
	}
	public function editUser($id = '') {
		$user = $this->loadModel('Users');
		$user = Auth::user();

		if ($user) {
			$user = Users::find($id);
			echo $this->renderView('layout/administration_edit', ['user' => $user]);
		}
		else {
			Redirect::controller('Login@index');
		}
	}
	public function editUserPost() {
		$user = $this->loadModel('Users');
		$user = Users::find($this->postInput('id'));

		$user->userName = $this->postInput('userName');
		$user->password = Hash::create($this->postInput('password'), PASSWORD_BCRYPT);
		$user->firstName = $this->postInput('firstName');
		$user->lastName = $this->postInput('lastName');
		$user->age = $this->postInput('age');
		$user->avatar = $this->postInput('avatar');
		$user->email = $this->postInput('email');
		$user->phone = $this->postInput('phone');
		$user->save();

		Redirect::controller('Administration/index');
	}
	public function deleteUser($id = '') {
		$user = $this->loadModel('Users');

		if ($user) {
			$user = Users::find($id);
			$user->delete();

			Redirect::controller('Administration/index');
		}
		else {
			Redirect::controller('Login@index');
		}
	}
}