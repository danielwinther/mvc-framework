<?php
class Redirect
{
	/**
	* Redirects to given URL
	*
	* @param string $url
	*/
	public static function url($url) {
		header('Location: ' . $url);
		exit();
	}

	/**
	* Redirects to given controller and method
	*
	* @param string $controller
	*/
	public static function controller($controller) {
		$atSign = explode('@', $controller);

		if (strpos($controller, '@') !== false) {
			header('Location:' . dirname($_SERVER['PHP_SELF']) . '/' . $atSign[0] . '/' . $atSign[1]);
		}
		else {
			$config = initializeConfig();
			header('Location:'. dirname($_SERVER['PHP_SELF']) . '/' . $atSign[0]);
		}
		exit();
	}
}