<?php
use Mailgun\Mailgun;
use Twilio\Rest\Client;

class Basic extends BaseController {
	public function index() {
		$users = $this->loadModel('Users');
		$users = Users::all()->sortBy('firstName');

		//Auth::login('daniel', 'admin');
		//print_r(Auth::user());
		//Auth::logout();

		//Auth::sendTwoFactor();
		//Auth::verifyTwoFactor('');

		echo $this->renderView('layout/basic', ['userArray' => $users]);
	}
	public function user($id = '') {
		$user = $this->loadModel('Users');
		$users = $this->loadModel('Roles');
		$user = Users::find($id);

		echo $this->renderView('layout/basic_detail', ['user' => $user]);
	}
	public function scrapeWebsite() {
		/*$curl = $this->session('https://m.facebook.com/login.php', ['email' => '', 'pass' => '', '_fb_noscript' => 'true']);
		$html = $this->scrape('GET', 'https://m.facebook.com/danielwintherjensendk/friends/', $curl);*/

		$html = $this->scrape('GET', 'http://ekstrabladet.dk/');

		return $html->getElementByTagName('title')->plaintext;
	}
	public function scrapePdf() {
		$pdf = $this->scrape('PDF', 'http://www.begravelsedanmark.dk/wp-content/uploads/2015/10/BDK-butik-prisliste-2015.pdf');

		$text = $pdf->getText();
		$text = preg_replace('/[\n\r]/', '<br>', $text);

		$string = '2015';
		$t = explode($string, $text);
		return $t[0] . $string;
	}
	public function returnModel() {
		$user = $this->loadModel('User');
		$user->setFirstName('daniel');

		return $user;
	}
	public function returnHash() {
		return Hash::create('daniel', PASSWORD_BCRYPT, SALT);
	}
	public function createUser() {
		$postInput = $this->postInput();

		$user = $this->loadModel('Users');
		Users::create($postInput);

		Redirect::controller('Basic');
	}
	public function editUser($id = '') {
		$user = $this->loadModel('Users');
		$user = Users::find($id);

		echo $this->renderView('layout/basic_edit', ['user' => $user]);
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

		Redirect::controller('Basic');
	}
	public function deleteUser($id = '') {
		$user = $this->loadModel('Users');
		$user = Users::find($id);
		$user->delete();

		Redirect::controller('Basic');
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