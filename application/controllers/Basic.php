<?php
use Goutte\Client;
class Basic extends BaseController {
	public function index() {
		$users = $this->loadModel('Users');
		$users = Users::all()->sortBy('firstName');

		echo $this->renderView('basic', ['userArray' => $users]);
	}
	public function user($id = '') {
		$user = $this->loadModel('Users');
		$user = Users::find($id);

		echo $this->renderView('basic_detail', ['user' => $user]);
	}
	public function scrapeWebsite() {
		/*$curl = $this->session('https://m.facebook.com/login.php', ['email' => '', 'pass' => '', '_fb_noscript' => 'true']);
		$html = $this->scrape('GET', 'https://m.facebook.com/danieldk1992/friends/', $curl);*/

		$html = $this->scrape('GET', 'http://ekstrabladet.dk/');

		return $html->getElementByTagName('title')->plaintext;
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
	public function redirectToUrl() {
		$this->redirectUrl(__DIR__ . '/returnString');
	}
	public function redirectToController() {
		$this->redirectController('Basic');
	}
	public function returnParameter($parameter = '') {
		return $parameter;
	}
	public function returnTwoParameters($parameter1 = '', $parameter2 = '') {
		return $parameter1 . $parameter2;
	}
}