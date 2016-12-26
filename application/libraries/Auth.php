<?php
use Twilio\Rest\Client;
class Auth
{
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
	* Logouts of user accoubt
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

		$client = new Client(TWILIO_SID, TWILIO_TOKEN);
		$client->messages->create(
			'+45' . $user->phone,
			array(
				'from' => '+46769447755',
				'body' => $user->twoFactorCode
				)
			);
	}

	/**
	* Verifies two-factor code
	*/
	public static function verifyTwoFactor($code) {
		$user = Auth::user();

		if ($user->twoFactorCode == $code) {
			$user->isTwoFactor = true;
			$user->save();
		}
	}
}