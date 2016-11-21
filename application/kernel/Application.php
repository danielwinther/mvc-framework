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
		$config = initializeConfig();
		$this->controller = $config['defaultController'];
		$this->method = $config['defaultMethod'];
		$this->parameter = $config['defaultParameters'];

		$this->load($this->parseUrl());
		$database = databaseConfig();
		$this->databaseConnection($database['hostname'], $database['databaseName'], $database['username'], $database['password']);
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
		if (isset($url[0])) {
			if (file_exists(realpath(__DIR__ . '/..') . '/controllers/' . $url[0] . '.php')) {
				$this->controller = $url[0];
				unset($url[0]);
			}
			else {
				$this->controller = $url[0];
				throw new ControllerNotFound('ControllerNotFound', 'Controller "' . $this->controller . '" not found.');
				exit();
			}
		}
		
		require_once realpath(__DIR__ . '/..') . '/controllers/' . $this->controller . '.php';
		$this->controller = new $this->controller;

		if (isset($url[1])) {
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
			else {
				$this->method = $url[1];
				throw new MethodNotFound('MethodNotFound', 'Method "' . $this->method . '" not found.');
				exit();
			}
		}

		$this->parameters = $url ? array_values($url) : [];

		call_user_func_array([$this->controller, $this->method], $this->parameters);
	}
	/**
	* Initiliaze database connection
	*
	* @param string $host
	* @param string $databaseName 
	* @param string $username
	* @param string $password
	*/
	protected function databaseConnection($host, $databaseName, $username, $password) {
		try
		{
			$pdo = new PDO('mysql:host=' . $host . ';dbname=' . $databaseName, $username, $password);

			/*$sth = $pdo->prepare('SELECT * FROM User');
			$sth->execute();
			$yellow = $sth->fetchAll();

			print_r($yellow);*/

		}
		catch (PDOException $exception)
		{
			throw new PDOException($exception->getMessage());
			exit();
		}
	}
}