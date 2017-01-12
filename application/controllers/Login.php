<?php
class Login extends BaseController {
	public function index() {
		echo $this->renderView('layout/login');
	}
	public function loginPost() {
		$user = $this->loadModel('Users');
		Auth::login($this->postInput('userName'), $this->postInput('password'));
		$user = Auth::user();

		if ($user) {
			Redirect::controller('Home@index');
		}
		else {
			Auth::login();

			Redirect::controller('Login@index');
		}
	}
	public function logout() {
		Auth::logout();

		Redirect::controller('Login@index');
	}
}