<?php
require_once '/../../application/models/User.php';

class UserTest extends PHPUnit_Framework_TestCase
{
	private $user;

	public function __construct() {
		$this->user = new User;
	}

	// First name tests
	public function testFirstNameIsNull()
	{
		$test = null;

		try {
			$this->user->setFirstName($test);
			$this->assertEmpty($this->user->getFirstName(), $test);
		} catch (InvalidArgumentException $e) {
			
		}
	}
	public function testFirstNameIsEmpty()
	{
		$test = '';

		try {
			$this->user->setFirstName($test);
			$this->assertEmpty($this->user->getFirstName(), $test);
		} catch (OutOfRangeException $e) {
			
		}
	}
	public function testFirstNameIsString()
	{
		$this->user->setFirstName('daniel');
		$this->assertInternalType('string', $this->user->getFirstName());
	}
	public function testFirstNameIsLesserThanTwo()
	{
		$test = 'd';

		try {
			$this->user->setFirstName($test);
			$this->assertEquals($this->user->getFirstName(), $test);
		} catch (OutOfRangeException $e) {
			
		}
	}
	public function testFirstNameIsEqualsTwo()
	{
		$test = 'da';

		$this->user->setFirstName($test);
		$this->assertEquals($this->user->getFirstName(), $test);
	}
	public function testFirstNameIsGreaterThanTwo()
	{
		$test = 'dan';

		$this->user->setFirstName($test);
		$this->assertEquals($this->user->getFirstName(), $test);
	}
	public function testFirstNameIsLesserThanOneHundred()
	{
		$test = 'qOZi0m3ujwWSiTaO4MTuaVtvbh4OnFD9rRwJyQP1BNmgQY9nC8j8gbaGoaYJjzuiCZqHzZPP6loNLczC8PfqSVso1mVH4uRhNNOQ';

		$this->user->setFirstName($test);
		$this->assertEquals($this->user->getFirstName(), $test);
	}
	public function testFirstNameEqualsOneHundred()
	{
		$test = 'qOZi0m3ujwWSiTaO4MTuaVtvbh4OnFD9rRwJyQP1BNmgQY9nC8j8gbaGoaYJjzuiCZqHzZPP6loNLczC8PfqSVso1mVH4uRhNNO';

		$this->user->setFirstName($test);
		$this->assertEquals($this->user->getFirstName(), $test);
	}
	public function testFirstNameIsGreaterThanOneHundred()
	{
		$test = 'qOZi0m3ujwWSiTaO4MTuaVtvbh4OnFD9rRwJyQP1BNmgQY9nC8j8gbaGoaYJjzuiCZqHzZPP6loNLczC8PfqSVso1mVH4uRhNNOQL';

		try {
			$this->user->setFirstName($test);
			$this->assertEquals($this->user->getFirstName(), $test);
		} catch (OutOfRangeException $e) {
			
		}
	}

	// Last name tests
	public function testLastNameIsNull()
	{
		$test = null;

		try {
			$this->user->setLastName($test);
			$this->assertEmpty($this->user->getLastName(), $test);
		} catch (InvalidArgumentException $e) {
			
		}
	}
	public function testLastNameIsEmpty()
	{
		$test = '';

		try {
			$this->user->setLastName($test);
			$this->assertEmpty($this->user->getLastName(), $test);
		} catch (OutOfRangeException $e) {
			
		}
	}
	public function testLastNameIsString()
	{
		$this->user->setLastName('daniel');
		$this->assertInternalType('string', $this->user->getLastName());
	}
	public function testLastNameIsLesserThanTwo()
	{
		$test = 'd';

		try {
			$this->user->setLastName($test);
			$this->assertEquals($this->user->getLastName(), $test);
		} catch (OutOfRangeException $e) {
			
		}
	}
	public function testLastNameIsEqualsTwo()
	{
		$test = 'da';

		$this->user->setLastName($test);
		$this->assertEquals($this->user->getLastName(), $test);

	}
	public function testLastNameIsGreaterThanTwo()
	{
		$test = 'dan';

		$this->user->setLastName($test);
		$this->assertEquals($this->user->getLastName(), $test);
	}
	public function testLastNameIsLesserThanOneHundred()
	{
		$test = '3EeL6X0uBcmOqzNMNMOUOZl3NF7XmiALZ21qgnYDmqhWxcayk0SDRN3WRzV7Qu3wGfmhYyrFUzkMHSqf8b2o2JtwlIEZXwvBs0V';

		$this->user->setLastName($test);
		$this->assertEquals($this->user->getLastName(), $test);
	}
	public function testLastNameIsEqualsOneHundred()
	{
		$test = '3EeL6X0uBcmOqzNMNMOUOZl3NF7XmiALZ21qgnYDmqhWxcayk0SDRN3WRzV7Qu3wGfmhYyrFUzkMHSqf8b2o2JtwlIEZXwvBs0VL';

		$this->user->setLastName($test);
		$this->assertEquals($this->user->getLastName(), $test);

	}
	public function testLastNameIsGreaterThanOneHundred()
	{
		$test = '3EeL6X0uBcmOqzNMNMOUOZl3NF7XmiALZ21qgnYDmqhWxcayk0SDRN3WRzV7Qu3wGfmhYyrFUzkMHSqf8b2o2JtwlIEZXwvBs0VOQ';

		try {
			$this->user->setLastName($test);
			$this->assertEquals($this->user->getLastName(), $test);
		} catch (OutOfRangeException $e) {
			
		}
	}

	// Age tests
	public function testAgeIsNull()
	{
		$test = null;

		try {
			$this->user->setAge($test);
			$this->assertEmpty($this->user->getAge(), $test);
		} catch (InvalidArgumentException $e) {
			
		}
	}
	public function testAgeIsInt()
	{
		$this->user->setAge(24);
		$this->assertInternalType('int', $this->user->getAge());
	}
	public function testAgeIsLesserThanThirteen()
	{
		$test = 12;

		try {
			$this->user->setAge($test);
			$this->assertEquals($this->user->getAge(), $test);
		} catch (OutOfRangeException $e) {
			
		}
	}
	public function testAgeIsEqualsThirteen()
	{
		$test = 13;

		$this->user->setAge($test);
		$this->assertEquals($this->user->getAge(), $test);
	}
	public function testAgeIsGreaterThanThirteen()
	{
		$test = 14;

		$this->user->setAge($test);
		$this->assertEquals($this->user->getAge(), $test);
	}
	public function testAgeIsLesserThanOneHundred()
	{
		$test = 99;

		$this->user->setAge($test);
		$this->assertEquals($this->user->getAge(), $test);
	}
	public function testAgeIsEqualsOneHundred()
	{
		$test = 100;

		$this->user->setAge($test);
		$this->assertEquals($this->user->getAge(), $test);
	}
	public function testAgeIsGreaterThanOneHundred()
	{
		$test = 101;

		try {
			$this->user->setAge($test);
			$this->assertEquals($this->user->getAge(), $test);
		} catch (OutOfRangeException $e) {
			
		}
	}

	// Email tests
	public function testEmailIsNull()
	{
		$test = null;

		try {
			$this->user->setEmail($test);
			$this->assertEmpty($this->user->getEmail(), $test);
		} catch (InvalidArgumentException $e) {
			
		}
	}
	public function testEmailIsEmpty()
	{
		$test = '';

		try {
			$this->user->setEmail($test);
			$this->assertEmpty($this->user->getEmail(), $test);
		} catch (InvalidArgumentException $e) {
			
		}
	}
	public function testEmailIsString()
	{
		$this->user->setEmail('daniel@mail.dk');
		$this->assertInternalType('string', $this->user->getEmail());
	}
	public function testEmailIsLesserThanOneHundred()
	{
		$test = '0popsSUXxYfIfBr9NG7CXL8Zz6luW1tnnT1984l1rLbIc50zjQ32Isa8BORoZ1y@mail.dk';

		$this->user->setEmail($test);
		$this->assertEquals($this->user->getEmail(), $test);
	}
	public function testEmailIsEqualsOneHundred()
	{
		$test = '0popsSUXxYfIfBr9NG7CXL8Zz6luW1tnnT1984l1rLbIc50zjQ32Isa8BORoZ1yO@mail.dk';

		$this->user->setEmail($test);
		$this->assertEquals($this->user->getEmail(), $test);
		
	}
	public function testEmailIsGreaterThanOneHundred()
	{
		$test = '0popsSUXxYfIfBr9NG7CXL8Zz6luW1tnnT1984l1rLbIc50zjQ32Isa8BORoZ1yJ@mail.dk';

		try {
			$this->user->setEmail($test);
			$this->assertEquals($this->user->getEmail(), $test);
		} catch (OutOfRangeException $e) {
			
		}
	}

	// Phone tests
	public function testPhoneIsNull()
	{
		$test = null;

		try {
			$this->user->setPhone($test);
			$this->assertEmpty($this->user->getPhone(), $test);
		} catch (InvalidArgumentException $e) {
			
		}
	}
	public function testPhoneIsEmpty()
	{
		$test = '';

		try {
			$this->user->setPhone($test);
			$this->assertEmpty($this->user->getPhone(), $test);
		} catch (OutOfRangeException $e) {
			
		}
	}
	public function testPhoneIsString()
	{
		$this->user->setPhone('88888888');
		$this->assertInternalType('string', $this->user->getPhone());
	}
	public function testPhoneIsLesserThanEight()
	{
		$test = '8888888';

		try {
			$this->user->setPhone($test);
			$this->assertEquals($this->user->getPhone(), $test);
		} catch (OutOfRangeException $e) {
			
		}
	}
	public function testPhoneIsEqualsEight()
	{
		$test = '88888888';

		$this->user->setPhone($test);
		$this->assertEquals($this->user->getPhone(), $test);
	}
	public function testPhoneIsGreaterThanEight()
	{
		$test = '888888888';

		try {
			$this->user->setPhone($test);
			$this->assertEquals($this->user->getPhone(), $test);
		} catch (OutOfRangeException $e) {
			
		}
	}
}