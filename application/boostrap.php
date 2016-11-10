<?php
/**
* Bootstraps all the necessary files for the framework to work
*/
error_reporting(E_ALL & ~E_NOTICE);
require_once 'exceptions/ModelNotFound.php';
require_once 'exceptions/ControllerNotFound.php';
require_once 'exceptions/MethodNotFound.php';
require_once 'exceptions/ViewNotFound.php';

require_once 'kernal/Application.php';
require_once 'kernal/BaseController.php';