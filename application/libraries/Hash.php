<?php
class Hash {
	/**
	* Creates a hashed string
	*
	* @param string $password
	* @param string $algorithm
	* @return string
	*/
	public static function create($password, $algorithm, $salt) {
		return password_hash($password, $algorithm, array('cost' => 10, 'salt' => $salt));
	}

	/**
	* Verify a hashed string
	*
	* @param string $password
	* @param string $algorithm
	* @return string $hash
	*/
	public static function verify($password, $algorithm) {
		$hash = Hash::create($password, PASSWORD_BCRYPT, SALT);
		if (password_verify($password, $hash)) {
			return $hash;	
		}
	}
}