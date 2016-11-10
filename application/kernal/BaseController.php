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
	public function view($view, $data = []) {
		if (file_exists('../application/views/' . $view . '.php')) {
			require_once '../application/views/' . $view . '.php';
		}
		else {
			throw new ViewNotFound('ViewNotFound', 'View "' . $view . '" not found.');
			exit();
		}
	}
}