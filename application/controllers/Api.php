<?php
class Api extends BaseController {
	public function index($format = 'JSON') {
		$user = $this->loadModel('Users');
		$user = Auth::user();

		if ($user) {
			$html = $this->scrape('GET', 'https://www.bedrebegravelse.dk/424/bedemand-priser-paa-begravelse-eller-bisaettelse');
			$html = $html->find('#divPreview > .fourth');
			
			foreach ($html as $value) {
				$products[] = ['typePrice' => $value->find('p', 0)->plaintext, 'description' => $value->find('a', 0)->title, 'image' => 'https://www.bedrebegravelse.dk/' . $value->find('img', 0)->src];
			}

			echo $this->convert($format, $products);
		}
		else {
			Redirect::controller('Login@index');
		}

	}
}