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
		'errorReporting' => error_reporting(E_ALL),
		'salt' => 'tw%zdRv%qgq@w#@HqK@FS)OT(3N2&e222l)Gg2wjyRvCtU*X)rbyS$lq@sfq3g#g'
	];
}