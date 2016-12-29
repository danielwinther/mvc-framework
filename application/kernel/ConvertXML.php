<?php
class ConvertXML implements ConvertStrategy {
	/**
	* Converts data to XML
	* 
	* @param array $data
	* @return string
	*/
	public function convert($data) {
		echo "string";
		$document = new DOMDocument();
		$child = $this->toXml($document, $data);
		if ($child) {
			$document->appendChild($child);
		}
		$document->formatOutput = true;
		return $document->saveXML();
	}

	/**
	* Converts data to XML format
	*
	* @param DOMDocument $dom
	* @param object/array $data
	* @return string $element
	*/
	private function toXml($dom, $data) {
		if (empty($data['name'])) {
			return false;
		}
		$elementValue = (!empty( $data['value'])) ? $data['value'] : null;
		$element = $dom->createElement( $data['name'], $elementValue);

		if (!empty( $data['attributes']) && is_array( $data['attributes'])) {
			foreach ($data['attributes'] as $attributeKey => $attributeValue) {
				$element->setAttribute($attributeKey, $attributeValue);
			}
		}
		foreach ($data as $dataKey => $childData) {
			if (!is_numeric($dataKey)) {
				continue;
			}
			$child = $this->toXml($dom, $childData);
			if ($child) {
				$element->appendChild($child);
			}
		}

		return $element;
	}
}