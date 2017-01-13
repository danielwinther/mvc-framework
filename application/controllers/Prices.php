<?php
class Prices extends BaseController {
	public function index() {
		$user = $this->loadModel('Users');
		$user = Auth::user();

		if ($user) {
			$html = $this->scrape('GET', 'https://www.bedrebegravelse.dk/424/bedemand-priser-paa-begravelse-eller-bisaettelse');
			$html = $html->find('#divPreview > .fourth');

			echo $this->renderView('layout/prices', ['html' => $html]);
		}
		else {
			Redirect::controller('Login@index');
		}
	}
}