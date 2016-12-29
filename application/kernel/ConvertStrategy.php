<?php
interface ConvertStrategy {
	/**
	* Converts data
	*
	* @param array $data
	*/
	public function convert($data);
}