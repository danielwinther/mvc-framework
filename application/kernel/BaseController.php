<?php
use \Smalot\PdfParser\Parser;

class BaseController {
	/*
	* Base constructor for all controllers
	*/
	public function __construct() {
		error_reporting(ERROR_REPORTING);
	}

	/**
	* Loads a given model into the controller
	*
	* @param string $model
	* @param array $constructor
	* @return object $model
	*/
	protected function loadModel($model, $constructor = []) {
		if (file_exists(realpath(__DIR__ . '/..') . '/models/' . $model . '.php')) {
			require_once realpath(__DIR__ . '/..') . '/models/' . $model . '.php';
		}
		else {
			throw new ModelNotFound('ModelNotFound', 'Model "' . $model . '" not found.');
			exit();
		}

		return new $model($constructor);
	}

	/**
	* Sanitizes and returns POST data 
	*
	* @param string $input
	* @return string/array
	*/
	protected function postInput($input = null) {
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if ($input) {
			return $post[$input];
		}
		else {
			return $post;
		}
	}

	/**
	* Loads a given view into the controller
	*
	* @param string $view
	* @param array $data
	*/
	protected function renderView($view, $data = []) {
		$loader = new Twig_Loader_Filesystem(realpath(__DIR__ . '/..') . '/views');
		$twig = new Twig_Environment($loader, [
			'debug' => true,
			]);
		$twig->addExtension(new Twig_Extension_Debug());

		return $twig->render($view . '.php', [
			'data' => $data
			]);
	}

	/**
	* Scrapes HTML source code from the given URL
	*
	* @param string $url
	* @param string $action
	* @param curl $curl
	* @return string $html
	*/
	protected function scrape($action, $url, $curl = null) {
		switch (strtoupper($action)) {
			case 'GET':
			$html = new simple_html_dom();
			if ($curl) {
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
				curl_setopt($curl, CURLOPT_POST, 0);
				curl_setopt($curl, CURLOPT_URL, $url);
				$html = str_get_html(curl_exec($curl));
				curl_close($curl);
			}
			else {
				$html->load_file($url);
			}
			return $html;
			break;
			
			case 'PDF':
			$parser = new Parser();
			$pdf = $parser->parseFile($url);

			return $pdf;
			break;
		}
	}

	/**
	* Initializes session with cURL and saves session cookies in file for later retrieval
	*
	* @param string $url
	* @param array $postData
	* @return $curl
	*/
	protected function session($url, $postData) {
		$curl = curl_init();

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 

		curl_setopt($curl, CURLOPT_URL, $url);
		$cookie = dirname(__FILE__) . '/cookies.txt';
		$timeout = 30;

		curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36');
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_TIMEOUT, 10); 
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
		curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie);
		curl_setopt($curl, CURLOPT_COOKIEFILE, $cookie);

		curl_setopt($curl, CURLOPT_POST, 1); 
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postData));     
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		unlink($cookie);
		curl_exec($curl);

		return $curl;
	}

	/**
	* Converts data to given format
	*
	* @param string $format
	* @param object/array
	* @return string
	*/
	public function convert($format, $data) {
		switch ($format) {
			case 'JSON':
			return json_encode($data, JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK);
			break;

			case 'XML':
			$doc = new DOMDocument();
			$child = $this->toXml($doc, $data);
			if ($child)
				$doc->appendChild($child);
			$doc->formatOutput = true; 
			return $xml = $doc->saveXML();
			break;

			case 'YAML':
			return yaml_emit($data, YAML_UTF8_ENCODING);
			break;
		}
	}

	/**
	* Converts data to XML format
	*
	* @param DOMDocument $dom
	* @param object/array $data
	* @return string $element
	*/
	private function toXml($dom, $data) {
		if (empty($data['name']))
			return false;

		$elementValue = (!empty( $data['value'])) ? $data['value'] : null;
		$element = $dom->createElement( $data['name'], $elementValue);

		if (!empty( $data['attributes']) && is_array( $data['attributes'])) {
			foreach ($data['attributes'] as $attributeKey => $attributeValue) {
				$element->setAttribute($attributeKey, $attributeValue);
			}
		}

		foreach ($data as $dataKey => $childData) {
			if (!is_numeric($dataKey))
				continue;

			$child = $this->toXml($dom, $childData);
			if ($child)
				$element->appendChild($child);
		}

		return $element;
	}
}