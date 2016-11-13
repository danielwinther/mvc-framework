<?php
/**
* Bootstraps all the necessary files for the framework to work
*/
//error_reporting(E_ALL & ~E_NOTICE);
foreach (glob(realpath(__DIR__) . '/exceptions/*.php') as $exception) {
    require_once $exception;
}

require_once realpath(__DIR__) . '/kernal/Application.php';
require_once realpath(__DIR__) . '/kernal/BaseController.php';