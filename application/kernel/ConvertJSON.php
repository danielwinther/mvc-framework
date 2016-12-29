<?php
class ConvertJSON implements ConvertStrategy {
	/**
	* Converts data to JSON
	* 
	* @param array $data
	* @return string
	*/
	public function convert($data) {
		return json_encode($data, JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK);
	}
}