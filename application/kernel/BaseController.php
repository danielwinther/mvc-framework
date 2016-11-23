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

}