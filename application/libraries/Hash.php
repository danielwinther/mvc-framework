<?php
class Hash
{
	/**
	* Creates a hashed string
	*
	* @param string $password
	* @param string $algorithm
	* @return string
	*/
	public static function create($password, $algorithm) {
		return password_hash($password, $algorithm, array('cost' => 10));
	}
}