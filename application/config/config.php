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
		'salt' => 'tw%zdRv%qgq@w#@HqK@FS)OT(3N2&e222l)Gg2wjyRvCtU*X)rbyS$lq@sfq3g#g',
		'mailgunKey' => 'key-ba1878e0cc7ef6ff386e54a3adc246e4',
		'mailgunDomain' => 'sandbox5c2500d99acf4cbfa26fa88a596a49bd.mailgun.org',
		'twilioSid' => 'AC4c1fb5304bcc8a164ec0cd47582c89c5',
		'twilioToken' => 'ea734470b88c855cdfa849bf62881fa2'
	];
}