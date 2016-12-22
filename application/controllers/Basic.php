<?php
use Mailgun\Mailgun;
use Twilio\Rest\Client;

class Basic extends BaseController {
	public function index() {
		$users = $this->loadModel('Users');
		$users = Users::all()->sortBy('firstName');

		echo $this->renderView('layout/basic', ['userArray' => $users]);
	}
	public function user($id = '') {
		$user = $this->loadModel('Users');
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
		return Hash::create('daniel', PASSWORD_BCRYPT);
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
	public function sendMail() {
		$config = initializeConfig();
		$mgClient = new Mailgun($config['mailgunKey']);
		$domain = $config['mailgunDomain'];

		$result = $mgClient->sendMessage($domain,
			array('from'    => 'Mailgun Sandbox <postmaster@sandbox5c2500d99acf4cbfa26fa88a596a49bd.mailgun.org>',
				'to'      => 'Daniel Winther Jensen <danielwinther@hotmail.dk>',
				'subject' => 'Hello Daniel Winther Jensen',
				'text'    => 'Congratulations Daniel Winther Jensen, you just sent an email with Mailgun!  You are truly awesome!  You can see a record of this email in your logs: https://mailgun.com/cp/log .  You can send up to 300 emails/day from this sandbox server.  Next, you should add your own domain so you can send 10,000 emails/month for free.'));
	}
	public function sendSMS() {
		$config = initializeConfig();
		$sid = $config['twilioSid'];
		$token = $config['twilioToken'];
		$client = new Client($sid, $token);

		$client->messages->create(
			'+4542341338',
			array(
				'from' => '+46769447755',
				'body' => 'This is a test'
				)
			);
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
}