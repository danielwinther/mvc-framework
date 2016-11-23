<?php
/**
* Bootstraps all the necessary files for the framework to work
*/
foreach (glob(realpath(__DIR__) . '/exceptions/*.php') as $exception) {
    require_once $exception;
}
foreach (glob(realpath(__DIR__) . '/config/*.php') as $config) {
    include $config;
}
require_once realpath(__DIR__ . '/..') . '/vendor/autoload.php';
require_once realpath(__DIR__) . '/config/database.php';
require_once realpath(__DIR__) . '/kernel/Application.php';
require_once realpath(__DIR__) . '/kernel/BaseController.php';