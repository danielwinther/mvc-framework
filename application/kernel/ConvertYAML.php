<?php
class ConvertYAML implements ConvertStrategy {
	/**
	* Converts data to YAML
	* 
	* @param array $data
	* @return string
	*/
	public function convert($data) {
		return yaml_emit($data, YAML_UTF8_ENCODING);
	}
}