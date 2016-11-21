<?php
require_once '/../../application/config/database.php';

class DatabaseTest extends PHPUnit_Framework_TestCase
{
	private $database;

	public function __construct() {
		$this->database = databaseConfig();
	}

	public function testConfigCorrectHostname() {
		$test = 'localhost';

		$this->assertEquals($this->database['hostname'], $test);
	}
	public function testConfigWrongHostname() {
		$test = 'localhost1';

		try {
			$this->assertEquals($this->database['hostname'], $test);
		} catch (Exception $e) {
			
		}
	}
	public function testConfigCorrectUsername() {
		$test = 'root';

		$this->assertEquals($this->database['username'], $test);
	}
	public function testConfigWrongUsername() {
		$test = 'root1';

		try {
			$this->assertEquals($this->database['username'], $test);
		} catch (Exception $e) {
			
		}
	}
	public function testConfigCorrectPassword() {
		$test = '';

		$this->assertEquals($this->database['password'], $test);
	}
	public function testConfigWrongPassword() {
		$test = 'admin';

		try {
			$this->assertEquals($this->database['password'], $test);
		} catch (Exception $e) {
			
		}
	}
	public function testConfigCorrectDatabaseName() {
		$test = 'mvc-framework';

		$this->assertEquals($this->database['databaseName'], $test);
	}
	public function testConfigWrongDatabaseName() {
		$test = 'mvc-framework1';

		try {
			$this->assertEquals($this->database['databaseName'], $test);
		} catch (Exception $e) {
			
		}
	}
	public function testConfigCorrectPrefix() {
		$test = '';

		$this->assertEquals($this->database['prefix'], $test);
	}
	public function testConfigWrongPrefix() {
		$test = 'bg_';

		try {
			$this->assertEquals($this->database['prefix'], $test);
		} catch (Exception $e) {
			
		}
	}
}