<?php
require_once '/../../application/config/config.php';

class ConfigTest extends PHPUnit_Framework_TestCase
{
	private $config;

	public function __construct() {
		$this->config = initializeConfig();
	}

	public function testConfigCorrectController() {
		$test = 'Basic';

		$this->assertEquals($this->config['defaultController'], $test);
	}
	public function testConfigWrongController() {
		$test = 'Basic1';

		try {
			$this->assertEquals($this->config['defaultController'], $test);
		} catch (Exception $e) {
			
		}
	}
	public function testConfigCorrectMethod() {
		$test = 'index';

		$this->assertEquals($this->config['defaultMethod'], $test);
	}
	public function testConfigWrongMethod() {
		$test = 'index1';

		try {
			$this->assertEquals($this->config['defaultController'], $test);
		} catch (Exception $e) {
			
		}
	}
	public function testConfigCorrectParameters() {
		$test = [];

		$this->assertEquals($this->config['defaultParameters'], $test);
	}
	public function testConfigWrongParameters() {
		$test = '[]';

		try {
			$this->assertEquals($this->config['defaultParameters'], $test);
		} catch (Exception $e) {
			
		}
	}
	public function testConfigCorrectCharset() {
		$test = 'UTF-8';

		$this->assertEquals($this->config['defaultCharset'], $test);
	}
	public function testConfigWrongCharset() {
		$test = 'UTF-9';

		try {
			$this->assertEquals($this->config['defaultCharset'], $test);
		} catch (Exception $e) {
			
		}
	}
	public function testConfigCorrectSalt() {
		$test = 'tw%zdRv%qgq@w#@HqK@FS)OT(3N2&e222l)Gg2wjyRvCtU*X)rbyS$lq@sfq3g#g';

		$this->assertEquals($this->config['salt'], $test);
	}
	public function testConfigWrongSalt() {
		$test = 'tw%zdRv%qgq@w#@HqK@FS)OT(3N2&e222l)Gg2wjyRvCtU*X)rbyS$lq@sfq3g#gaa';

		try {
			$this->assertEquals($this->config['salt'], $test);
		} catch (Exception $e) {
			
		}
	}
	public function testConfigCorrectMailgunKey() {
		$test = 'key-ba1878e0cc7ef6ff386e54a3adc246e4';

		$this->assertEquals($this->config['mailgunKey'], $test);
	}
	public function testConfigWrongMailgunKey() {
		$test = 'key-ba1878e0cc7ef6ff386e54a3adc246e4ytyfh';

		try {
			$this->assertEquals($this->config['mailgunKey'], $test);
		} catch (Exception $e) {
			
		}
	}
	public function testConfigCorrectMailgunDomain() {
		$test = 'sandbox5c2500d99acf4cbfa26fa88a596a49bd.mailgun.org';

		$this->assertEquals($this->config['mailgunDomain'], $test);
	}
	public function testConfigWrongMailgunDomain() {
		$test = 'sandbox5c2500d99acf4cbfa26fa88a596a49bd.mailgun.dk';

		try {
			$this->assertEquals($this->config['mailgunDomain'], $test);
		} catch (Exception $e) {
			
		}
	}
	public function testConfigCorrectTwilioSid() {
		$test = 'AC4c1fb5304bcc8a164ec0cd47582c89c5';

		$this->assertEquals($this->config['twilioSid'], $test);
	}
	public function testConfigWrongTwilioSid() {
		$test = 'AC4c1fb5304bcc8a164ec0cd47582c89c54';

		try {
			$this->assertEquals($this->config['twilioSid'], $test);
		} catch (Exception $e) {
			
		}
	}
	public function testConfigCorrectTwilioToken() {
		$test = 'ea734470b88c855cdfa849bf62881fa2';

		$this->assertEquals($this->config['twilioToken'], $test);
	}
	public function testConfigWrongTwilioToken() {
		$test = 'ea734470b88c855cdfa849bf62881fa2gfd';

		try {
			$this->assertEquals($this->config['twilioToken'], $test);
		} catch (Exception $e) {
			
		}
	}
}