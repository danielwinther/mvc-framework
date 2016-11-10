<?php
class BaseController {
	/**
	* Loads a given model into the controller
	*
	* @param string $model
	* @return $model
	*/
	protected function loadModel($model) {
		if (file_exists('../application/models/' . $model . '.php')) {
			require_once '../application/models/' . $model . '.php';
		}
		else {
			throw new ModelNotFound('ModelNotFound', 'Model "' . $model . '" not found.');
			exit();
		}

		return new $model();
	}

	/**
	* Loads a given view into the controller
	*
	* @param string $view
	* @param array data
	*/
	protected function renderView($view, $data = []) {
		if (file_exists('../application/views/' . $view . '.php')) {
			require_once '../application/views/' . $view . '.php';
		}
		else {
			throw new ViewNotFound('ViewNotFound', 'View "' . $view . '" not found.');
			exit();
		}
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