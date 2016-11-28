<?php
/**
* Initialize config variables
*/
function initializeConfig() {
	return [
		'defaultController' => 'Basic',
		'defaultMethod' => 'index',
		'defaultParameters' => [],
		'defaultCharset' => 'UTF-8',
		'errorReporting' => error_reporting(E_ALL)
	];
}