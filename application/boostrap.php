<?php
/**
* Bootstraps all the necessary files for the framework to work
*/
require_once realpath(__DIR__ . '/..') . '/vendor/autoload.php';
foreach (glob(realpath(__DIR__) . '/exceptions/*.php') as $exception) {
	require_once $exception;
}
foreach (glob(realpath(__DIR__) . '/config/*.php') as $config) {
	require_once $config;
}
require_once realpath(__DIR__) . '/libraries/simple_html_dom.php';
require_once realpath(__DIR__) . '/libraries/Hash.php';
require_once realpath(__DIR__) . '/libraries/Redirect.php';
require_once realpath(__DIR__) . '/libraries/Session.php';
require_once realpath(__DIR__) . '/libraries/Auth.php';
require_once realpath(__DIR__) . '/kernel/ControllerFactory.php';
require_once realpath(__DIR__) . '/kernel/ModelFactory.php';
require_once realpath(__DIR__) . '/kernel/Application.php';
require_once realpath(__DIR__) . '/kernel/SingletonInterface.php';
require_once realpath(__DIR__) . '/kernel/ApplicationSingleton.php';
require_once realpath(__DIR__) . '/kernel/BaseController.php';
require_once realpath(__DIR__) . '/kernel/ConvertStrategy.php';
require_once realpath(__DIR__) . '/kernel/ConvertJSON.php';
require_once realpath(__DIR__) . '/kernel/ConvertXML.php';
require_once realpath(__DIR__) . '/kernel/ConvertYAML.php';