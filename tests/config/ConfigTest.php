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
}