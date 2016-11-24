<?php
require_once '/../../application/kernel/BaseController.php';
require_once '/../../application/controllers/Basic.php';

class BasicTest extends PHPUnit_Framework_TestCase
{
	private $basic;

	public function __construct() {
		$this->basic = new Basic;
	}

	public function testReturnModel() {
		$test = 'daniel';

		$this->assertEquals($this->basic->returnModel()->getFirstName(), $test);
	}
	public function testIsString()
	{
		$this->assertInternalType('string', $this->basic->returnString());
	}
	public function testReturnString()
	{
		$test = 'daniel';

		$this->assertEquals($this->basic->returnString(), $test);
	}
	public function testIsInt()
	{
		$this->assertInternalType('int', $this->basic->returnInt());
	}
	public function testReturnInt()
	{
		$test = 24;

		$this->assertEquals($this->basic->returnInt(), $test);
	}
	public function testReturnParameter() {
		$test = 'daniel';

		$this->assertEquals($this->basic->returnParameter('daniel'), $test);
	}
	public function testReturnSeveralParameters() {
		$test = 10;

		$this->assertEquals($this->basic->returnSeveralParameters(5, 5), $test);
	}
}