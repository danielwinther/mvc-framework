<?php
class Application {
	/**
	* @var string $controller
	*/
	protected $controller = 'Home';
	/**
	* @var string $index
	*/
	protected $method = 'index';
	/**
	* @var array parameters
	*/
	protected $parameters = [];

	/**
	* Initializes the application
	*/
	public function __construct() {
		$this->load($this->parseUrl());
	}

	/**
	* Parses a given URL to make it read controllers, methods and parameters properly
	*
	* @return string
	*/
	protected function parseUrl() {
		if (isset($_GET['url'])) {
			return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}

	/**
	* Loads a given controller, method and parameter based on the URL
	*
	* @param string $url
	*/
	protected function load($url) {
		if (file_exists('../application/controllers/' . $url[0] . '.php')) {
			$this->controller = $url[0];
			unset($url[0]);

			require_once '../application/controllers/' . $this->controller . '.php';
			$this->controller = new $this->controller;
		}
		else {
			throw new ControllerNotFound('ControllerNotFound', 'Controller "' . $this->controller . '" not found.');
			exit();
		}

		if ($url[1] == '' || $url[1] == 'index') {
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}
		else {
			throw new MethodNotFound('MethodNotFound', 'Method "' . $this->method . '" not found.');
			exit();
		}

		$this->parameters = $url ? array_values($url) : [];

		call_user_func_array([$this->controller, $this->method], $this->parameters);
	}
}