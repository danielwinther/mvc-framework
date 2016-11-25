<?php
class BaseController {
	const GET = null;
	const POST = null;
	const UPDATE = null;
	const DELETE = null;

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
	}

	/**
	* Redirects to given controller and method
	*
	* @param string $controller
	*/
	protected function redirectController($controller) {
		$atSign = explode('@', $controller);

		if (strpos($controller, '@') !== false) {
			header('Location:../' . $atSign[0] . '/' . $atSign[1]);
		}
		else {
			header('Location:../' . $atSign[0] . '/index');
		}
	}

	/**
	* Scrapes HTML source code from the given URL
	*
	* @param string $url
	* @param const $action
	* @return string $html
	*/
	public function scrape($action, $url) {
		switch ($action) {
			case self::GET:
			$html = new simple_html_dom();
			$html->load_file($url);
			break;

			case self::POST:
			echo 'post';

			case self::UPDATE:
			echo 'update';

			case self::DELETE:
			echo 'delete';
			break;
		}

		return $html;
	}
}