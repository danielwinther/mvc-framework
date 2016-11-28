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
require_once realpath(__DIR__) . '/kernel/Application.php';
require_once realpath(__DIR__) . '/kernel/BaseController.php';