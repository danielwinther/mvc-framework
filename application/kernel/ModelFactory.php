<?php
class ModelFactory {
	/**
	* Creates instance of model class
	*
	* @param string $model
	* @param array $constructor
	* @return object $model
	*/
	public static function create($model, $constructor = []) {
		if (file_exists(realpath(__DIR__ . '/..') . '/models/' . $model . '.php')) {
			require_once realpath(__DIR__ . '/..') . '/models/' . $model . '.php';
		}
		else {
			throw new ModelNotFound('ModelNotFound', 'Model "' . $model . '" not found.');
			exit();
		}

		return new $model($constructor);
	}
}