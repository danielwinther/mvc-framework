<?php
class ControllerFactory {
	/**
	* Creates instance of controller
	*
	* @param string $url
	* @param string $controller
	* @param string $method
	* @param string $parameter
	*/
	public static function create($url, $controller, $method, $parameter) {
		if (isset($url[0])) {
			if (file_exists(realpath(__DIR__ . '/..') . '/controllers/' . $url[0] . '.php')) {
				$controller = $url[0];
				unset($url[0]);
			}
			else {
				$controller = $url[0];
				throw new ControllerNotFound('ControllerNotFound', 'Controller "' . $controller . '" not found.');
				exit();
			}
		}
		
		require_once realpath(__DIR__ . '/..') . '/controllers/' . $controller . '.php';
		$controller = new $controller;

		if (isset($url[1])) {
			if (method_exists($controller, $url[1])) {
				$method = $url[1];
				unset($url[1]);
			}
			else {
				$method = $url[1];
				throw new MethodNotFound('MethodNotFound', 'Method "' . $method . '" not found.');
				exit();
			}
		}

		$parameter = $url ? array_values($url) : [];

		call_user_func_array([$controller, $method], $parameter);
	}
}