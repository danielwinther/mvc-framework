<?php
class Prices extends BaseController {
	public function bedreBegravelse() {
		$user = $this->loadModel('Users');
		$user = Auth::user();

		if ($user) {
			$html = $this->scrape('GET', 'https://www.bedrebegravelse.dk/424/bedemand-priser-paa-begravelse-eller-bisaettelse');
			$html = $html->find('#divPreview > .fourth');

			echo $this->renderView('layout/bedre_begravelse', ['html' => $html]);
		}
		else {
			Redirect::controller('Login@index');
		}
	}
	public function dkBegravelse() {
		$user = $this->loadModel('Users');
		$user = Auth::user();

		if ($user) {
			$html = $this->scrape('GET', 'http://www.dk-begravelse.dk/Priser/Kister');
			$html = $html->find('#eid507114 table td table');

			echo $this->renderView('layout/dk_begravelse', ['html' => $html]);
		}
		else {
			Redirect::controller('Login@index');
		}
	}
}