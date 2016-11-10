<?php
class Home extends BaseController {
	public function index($p1 = '', $p2 = '') {
		$model = $this->loadModel('User');

		return $this->renderView('test', ['name' => $model, 'p1' => $p1, 'p2' => $p2]);
	}
	public function test() {
		$this->redirectController('Home@test1');
	}
	public function test1() {
		echo 'test1';
	}
}