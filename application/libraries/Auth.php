<?php
use Twilio\Rest\Client;

class Auth {
	/**
	* Logins to user account
	*
	* @param string $userName
	* @param string $password
	*/
	public static function login($userName, $password) {
		$user = Users::where('userName', $userName)->where('password', Hash::verify($password, PASSWORD_BCRYPT))->first();
		if ($user) {
			Session::init();
			Session::set('id', $user->id);
		}
	}

	/**
	* Logouts out of user account
	*/
	public static function logout() {
		Session::destroy('id');
	}

	/**
	* Gets user data from session
	*
	* @return Users
	*/
	public static function user() {
		$user = Session::get('id');
		
		return Users::find($user);
	}

	/**
	* Sends two-factor code via SMS
	*/
	public static function sendTwoFactor() {
		$user = Auth::user();
		$code = Auth::generateCode();

		$client = new Client(TWILIO_SID, TWILIO_TOKEN);
		$client->messages->create(
			'+45' . $user->phone,
			[	
			'from' => '+46769447755',
			'body' => 'Two-factor code: ' . $code
			]
			);

		$user->twoFactorCode = $code;
		$user->save();
	}

	/**
	* Generate Two-factor code
	* 
	* @return string
	*/
	private static function generateCode($length = 10) {
		return substr(str_shuffle(str_repeat($code = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($code)) )), 1, $length);
	}

	/**
	* Verifies two-factor code
	*/
	public static function verifyTwoFactor($code) {
		$user = Auth::user();

		if ($user->twoFactorCode == $code) {
			$user->isTwoFactor = true;
		}
		else {
			$user->isTwoFactor = false;
		}
		$user->save();
	}
}