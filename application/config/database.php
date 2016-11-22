<?php
/**
Initialize database variables
*/
require_once realpath(__DIR__ . '/../..') . '/vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();
$capsule->addConnection([
	'driver' => 'mysql',
	'host' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'mvc-framework',
	'charset' => 'utf8',
	'collation' => 'utf8_unicode_ci',
	'prefix' => ''
]);

$capsule->bootEloquent();