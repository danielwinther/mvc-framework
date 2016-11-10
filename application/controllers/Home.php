<?php
class Home extends BaseController {
	public function index($name = '') {
		$model = $this->loadModel('User');

		return $this->view('test', ['name' => $model->lol()]);
	}
}