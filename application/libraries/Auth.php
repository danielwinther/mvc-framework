<?php
use Twilio\Rest\Client;
class Auth
{
	public static function login($userName, $password) {
		$user = Users::where('userName', $userName)->where('password', Hash::verify($password, PASSWORD_BCRYPT))->first();
		if ($user) {
			Session::init();
			Session::set('id', $user->id);
		}
	}
	public static function logout() {
		Session::destroy('id');
	}
	public static function user() {
		$user = Session::get('id');
		return Users::find($user);
	}
	public static twoFactor() {
		if () {
			# code...
		}
	}
}