<?php
class Application {
	/**
	* @var string $controller
	*/
	protected $controller;

	/**
	* @var string $index
	*/
	protected $method;

	/**
	* @var array parameters
	*/
	protected $parameter;

	/**
	* Initializes the application
	*/
	public function __construct() {
		$this->controller = CONTROLLER;
		$this->method = METHOD;
		$this->parameter = PARAMETER;

		ControllerFactory::create($this->parseUrl(), $this->controller, $this->method, $this->parameter);
	}

	/**
	* Parses a given URL to make it read controllers, methods and parameters properly
	*
	* @return string
	*/
	private function parseUrl() {
		if (isset($_GET['url'])) {
			return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}
}