<?php
class User {
	private $id;
	private $firstName;
	private $lastName;
	private $age;
	private $email;
	private $phone;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getFirstName(){
		return $this->firstName;
	}

	public function setFirstName($firstName){
		if (is_null($firstName)) {
			throw new InvalidArgumentException('First name not allowed to be null!');
		}
		if (is_numeric($firstName)) {
			throw new InvalidArgumentException('First name not allowed to be int!');
		}
		if (strlen(utf8_decode($firstName)) < 2) {
			throw new OutOfRangeException('First name should be greater than 2 characters!');
		}
		if (strlen(utf8_decode($firstName)) > 100) {
			throw new OutOfRangeException('First name should be lesser than 100 characters!');
		}

		$this->firstName = $firstName;
	}

	public function getLastName(){
		return $this->lastName;
	}

	public function setLastName($lastName){
		if (is_null($lastName)) {
			throw new InvalidArgumentException('Last name not allowed to be null!');
		}
		if (is_numeric($lastName)) {
			throw new InvalidArgumentException('Last name not allowed to be int!');
		}
		if (strlen(utf8_decode($lastName)) < 2) {
			throw new OutOfRangeException('Last name should be greater than 2 characters!');
		}
		if (strlen(utf8_decode($lastName)) > 100) {
			throw new OutOfRangeException('Last name should be lesser than 100 characters!');
		}

		$this->lastName = $lastName;
	}

	public function getAge(){
		return $this->age;
	}

	public function setAge($age){
		if (is_null($age)) {
			throw new InvalidArgumentException('Age not allowed to be null!');
		}
		if (!is_numeric($age)) {
			throw new InvalidArgumentException('Age not allowed to be string!');
		}
		if ($age < 13) {
			throw new OutOfRangeException('Age should be greater than 13!');
		}
		if ($age > 100) {
			throw new OutOfRangeException('Age should be lesser than 100!');
		}

		$this->age = $age;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		if (is_null($email)) {
			throw new InvalidArgumentException('Email not allowed to be null!');
		}
		if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			throw new InvalidArgumentException('Email is not valid!');
		}
		if (strlen(utf8_decode($email)) > 100) {
			throw new OutOfRangeException('Email should be lesser than 100 characters!');
		}

		$this->email = $email;
	}

	public function getPhone(){
		return $this->phone;
	}

	public function setPhone($phone){
		if (is_null($phone)) {
			throw new InvalidArgumentException('Phone not allowed to be null!');
		}	
		if (strlen(utf8_decode($phone)) < 8) {
			throw new OutOfRangeException('Phone should be greater than 7 characters!');
		}
		if (strlen(utf8_decode($phone)) > 8) {
			throw new OutOfRangeException('Phone should be lesser than 9 characters!');
		}

		$this->phone = $phone;
	}

	public function __toString() {
		return $this->firstName . ' - ' . $this->lastName . ' - ' . $this->age . ' - ' . $this->email . ' - ' . $this->phone;
	}
}