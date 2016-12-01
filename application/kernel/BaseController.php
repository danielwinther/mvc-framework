<?php
class BaseController {
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
	* Redirects to given URL
	*
	* @param string $url
	*/
	protected function redirectUrl($url) {
		header('Location: ' . $url);
		die();
	}

	/**
	* Redirects to given controller and method
	*
	* @param string $controller
	*/
	protected function redirectController($controller) {
		$atSign = explode('@', $controller);

		if (strpos($controller, '@') !== false) {
			header('Location:' . realpath(__DIR__ . '/..') . $atSign[0] . '/' . $atSign[1]);
		}
		else {
			$config = initializeConfig();
			header('Location:'. realpath(__DIR__ . '/..') . $atSign[0] . '/' . $config['defaultMethod']);
		}
		die();
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
		$html = new simple_html_dom();

		switch (strtoupper($action)) {
			case 'GET':
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
			break;
		}

		return $html;
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
}