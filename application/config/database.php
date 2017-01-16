<?php
/**
Initialize database variables
*/
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();
$capsule->addConnection([
	'driver' => DRIVER,
	'host' => HOST,
	'username' => USERNAME,
	'password' => PASSWORD,
	'database' => DATABASE,
	'charset' => CHARSET,
	'collation' => COLLATION,
	'prefix' => PREFIX
]);

$capsule->bootEloquent();