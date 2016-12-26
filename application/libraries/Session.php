<?php
class Session
{
	/**
	* Initializes session
	*/
	public static function init() {
		session_start();
	}

	/**
	* Sets session value
	*/
	public static function set($key, $value) {
		$_SESSION[$key] = $value;
	}
	/**
	* Gets session value
	*
	* @return string array
	*/
	public static function get($key) {
		if (isset($_SESSION[$key])) {
			return $_SESSION[$key];
		}
	}
	/**
	* Destroys session
	*/
	public static function destroy($key) {
		if (isset($_SESSION[$key])) {
			unset($_SESSION[$key]);
			session_destroy();
		}
	}
}