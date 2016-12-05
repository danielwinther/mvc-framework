<?php
require_once '/../../application/kernel/BaseController.php';
require_once '/../../application/controllers/Basic.php';
require_once '/../../application/libraries/simple_html_dom.php';

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
	public function testReturnTwoParameters() {
		$test = 'daniel';

		$this->assertEquals($this->basic->returnTwoParameters('dan', 'iel'), $test);
	}
	public function testReturnWrongParameters() {
		$test = 'daniel';

		try {
			$this->assertEquals($this->basic->returnTwoParameters('dan'), $test);
		} catch (Exception $e) {
			
		}
	}
	/*public function testScrapeGetCorrect() {
		$test = 'Nyheder, sport og underholdning – Ekstra Bladet';

		$this->assertEquals($this->basic->scrapeWebsite(), $test);
	}
	public function testScrapeGetWrong() {
		$test = 'Ekstra Bladet';

		try {
			$this->assertEquals($this->basic->scrapeWebsite(), $test);
		} catch (Exception $e) {
			
		}
	}*/
	public function testHashCorrect() {
		$test = 'cfcd208495d565ef66e7dff9f98764da';

		$this->assertEquals($this->basic->hashString('daniel'), $test);
	}
	public function testHashWrong() {
		$test = 'cfcd208495d565ef66e7dff9f98764daa';

		try {
			$this->assertEquals($this->basic->hashString('daniel'), $test);
		} catch (Exception $e) {
			
		}
	}
}