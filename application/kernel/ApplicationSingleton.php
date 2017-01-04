<?php
class ApplicationSingleton implements SingletonInterface {
	/**
	* @var Application $instance
	*/
	public static $instance;

	/**
	* Singleton constructor
	*/
	private function __construct() {}

	/**
	* Gets instance of application
	*
	* @return Application
	*/
	public static function getInstance() {
		if (ApplicationSingleton::$instance == null) {
			ApplicationSingleton::$instance = new Application;
		}

		return ApplicationSingleton::$instance;
	}
}