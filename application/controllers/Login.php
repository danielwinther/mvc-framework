<?php
use Mailgun\Mailgun;

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
	public function createUser() {
		$user = $this->loadModel('Users');
		$this->loadModel('Roles');

		if (!Users::where('userName', $this->postInput('userName'))->first()) {
			$user->userName = $this->postInput('userName');
			$user->password = Hash::create($this->postInput('password'), PASSWORD_BCRYPT);
			$user->firstName = $this->postInput('firstName');
			$user->lastName = $this->postInput('lastName');
			$user->age = $this->postInput('age');
			$user->avatar = $this->postInput('avatar');
			$user->email = $this->postInput('email');
			$user->phone = $this->postInput('phone');
			$user->roleId = 1;
			$user->save();
		}


		Redirect::controller('Login@index');
	}
	public function forgottenPassword() {
		$user = $this->loadModel('Users');
		$user = Users::where('userName', $this->postInput('userName'))->first();

		if ($user) {
			$password = Auth::generateCode(10);
			$user->password = Hash::create($password, PASSWORD_BCRYPT);

			$client = new Mailgun(MAILGUN_KEY);
			$domain = MAILGUN_DOMAIN;

			$client->sendMessage($domain,
				array('from'    => 'Mailgun Sandbox <postmaster@sandbox5c2500d99acf4cbfa26fa88a596a49bd.mailgun.org>',
					'to'      => $user->email,
					'subject' => 'MVC Framework - new password',
					'text'    => 'Your new password is: ' . $password));
			$user->save();

			Redirect::controller('Login@index');
		}
		else {
			Redirect::controller('Login@index');
		}
	}
}