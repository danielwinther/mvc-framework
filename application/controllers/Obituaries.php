<?php
class Obituaries extends BaseController {
	public function index() {
		$user = $this->loadModel('Users');
		$user = Auth::user();

		if ($user) {
			echo $this->renderView('layout/obituaries');
		}
		else {
			Redirect::controller('Login@index');
		}
	}
}