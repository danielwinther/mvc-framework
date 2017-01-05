<?php
class Hash {
	/**
	* Creates a hashed string
	*
	* @param string $password
	* @param string $algorithm
	* @return string
	*/
	public static function create($password, $algorithm) {
		return password_hash($password, $algorithm, array('cost' => 10, 'salt' => SALT));
	}

	/**
	* Verify a hashed string
	*
	* @param string $password
	* @param string $algorithm
	* @return string $hash
	*/
	public static function verify($password, $algorithm) {
		$hash = Hash::create($password, $algorithm, SALT);
		if (password_verify($password, $hash)) {
			return $hash;	
		}
	}
}