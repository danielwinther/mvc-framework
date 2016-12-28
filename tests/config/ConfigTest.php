<?php
require_once '/../../application/config/config.php';

class ConfigTest extends PHPUnit_Framework_TestCase
{
	public function testConfigCorrectController() {
		$test = 'Basic';

		$this->assertEquals(CONTROLLER, $test);
	}
	public function testConfigWrongController() {
		$test = 'Basic1';

		try {
			$this->assertEquals(CONTROLLER, $test);
		} catch (Exception $e) {
			
		}
	}
	public function testConfigCorrectMethod() {
		$test = 'index';

		$this->assertEquals(METHOD, $test);
	}
	public function testConfigWrongMethod() {
		$test = 'index1';

		try {
			$this->assertEquals(METHOD, $test);
		} catch (Exception $e) {
			
		}
	}
	public function testConfigCorrectParameters() {
		$test = [];

		$this->assertEquals(PARAMETER, $test);
	}
	public function testConfigWrongParameters() {
		$test = '[]';

		try {
			$this->assertEquals(PARAMETER, $test);
		} catch (Exception $e) {
			
		}
	}
	public function testConfigCorrectCharset() {
		$test = 'UTF-8';

		$this->assertEquals(CHARSET, $test);
	}
	public function testConfigWrongCharset() {
		$test = 'UTF-9';

		try {
			$this->assertEquals(CHARSET, $test);
		} catch (Exception $e) {
			
		}
	}
	public function testConfigCorrectSalt() {
		$test = '9EHxZnEEJ#$m*kRp6IJ-nLxTPAkUoCA*Bm72H%SrmTTgFoTKss4)RuwAmOcEgar(';

		$this->assertEquals(SALT, $test);
	}
	public function testConfigWrongSalt() {
		$test = '9EHxZnEEJ#$m*kRp6IJ-nLxTPAkUoCA*Bm72H%SrmTTgFoTKss4)RuwAmOcEgar(dfsd';

		try {
			$this->assertEquals(SALT, $test);
		} catch (Exception $e) {

		}
	}
	public function testConfigCorrectMailgunKey() {
		$test = 'key-ba1878e0cc7ef6ff386e54a3adc246e4';

		$this->assertEquals(MAILGUN_KEY, $test);
	}
	public function testConfigWrongMailgunKey() {
		$test = 'key-ba1878e0cc7ef6ff386e54a3adc246e4ytyfh';

		try {
			$this->assertEquals(MAILGUN_KEY, $test);
		} catch (Exception $e) {
			
		}
	}
	public function testConfigCorrectMailgunDomain() {
		$test = 'sandbox5c2500d99acf4cbfa26fa88a596a49bd.mailgun.org';

		$this->assertEquals(MAILGUN_DOMAIN, $test);
	}
	public function testConfigWrongMailgunDomain() {
		$test = 'sandbox5c2500d99acf4cbfa26fa88a596a49bd.mailgun.dk';

		try {
			$this->assertEquals(MAILGUN_DOMAIN, $test);
		} catch (Exception $e) {
			
		}
	}
	public function testConfigCorrectTwilioSid() {
		$test = 'AC4c1fb5304bcc8a164ec0cd47582c89c5';

		$this->assertEquals(TWILIO_SID, $test);
	}
	public function testConfigWrongTwilioSid() {
		$test = 'AC4c1fb5304bcc8a164ec0cd47582c89c54';

		try {
			$this->assertEquals(TWILIO_SID, $test);
		} catch (Exception $e) {
			
		}
	}
	public function testConfigCorrectTwilioToken() {
		$test = 'ea734470b88c855cdfa849bf62881fa2';

		$this->assertEquals(TWILIO_TOKEN, $test);
	}
	public function testConfigWrongTwilioToken() {
		$test = 'ea734470b88c855cdfa849bf62881fa2gfd';

		try {
			$this->assertEquals(TWILIO_TOKEN, $test);
		} catch (Exception $e) {
			
		}
	}
}