<?php
class Administration extends BaseController {
	public function index() {
		$users = $this->loadModel('Users');
		$roles = $this->loadModel('Roles');
		$user = Auth::user();

		if ($user) {
			$users = Users::all()->sortBy('firstName');
			$roles = Roles::all();
			echo $this->renderView('layout/administration', ['userArray' => $users, 'user' => $user, 'roles' => $roles]);
		}
		else {
			Redirect::controller('Login@index');
		}
	}
	public function user($id = '') {
		$user = $this->loadModel('Users');
		$this->loadModel('Roles');
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
		$user = $this->loadModel('Users');
		$this->loadModel('Roles');

		$user->userName = $this->postInput('userName');
		$user->password = Hash::create($this->postInput('password'), PASSWORD_BCRYPT);
		$user->firstName = $this->postInput('firstName');
		$user->lastName = $this->postInput('lastName');
		$user->age = $this->postInput('age');
		$user->avatar = $this->postInput('avatar');
		$user->email = $this->postInput('email');
		$user->phone = $this->postInput('phone');
		$user->roleId = $this->postInput('role');
		$user->save();

		Redirect::controller('Administration/index');
	}
	public function editUser($id = '') {
		$user = $this->loadModel('Users');
		$roles = $this->loadModel('Roles');
		$user = Auth::user();

		if ($user) {
			$user = Users::find($id);
			$roles = Roles::all();
			echo $this->renderView('layout/administration_edit', ['user' => $user, 'roles' => $roles]);
		}
		else {
			Redirect::controller('Login@index');
		}
	}
	public function editUserPost() {
		$user = $this->loadModel('Users');
		$this->loadModel('Roles');
		$user = Users::find($this->postInput('id'));

		$user->userName = $this->postInput('userName');
		$user->password = Hash::create($this->postInput('password'), PASSWORD_BCRYPT);
		$user->firstName = $this->postInput('firstName');
		$user->lastName = $this->postInput('lastName');
		$user->age = $this->postInput('age');
		$user->avatar = $this->postInput('avatar');
		$user->email = $this->postInput('email');
		$user->phone = $this->postInput('phone');
		$user->roleId = $this->postInput('role');
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