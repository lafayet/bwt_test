<?php
use GuzzleHttp\Client;
use PHPHtmlParser\Dom;

class Model_Weather extends Model
{
	public function get_data()
	{	

		$client = new Client();
		$res = $client->request('GET', 'https://www.gismeteo.ua/weather-zaporizhia-5093/', [
			'headers' => ['User-Agent' => 'testing/1.0',
						  'Accept'     => 'text/html']]
		);
		if ($res->getStatusCode() == 200)
		{
			$site_html = (string)$res->getBody();			
			$dom = new Dom;
			$dom->setOptions([
				'enforceEncoding' => 'utf-8',
			]);
			$dom->load($site_html);
			$cloudness = $dom->find('dt.png');
			$cloudness_w = $dom->find('dl.cloudness')->find('td');
			$temp = $cloudness->getAttribute('style');
			$cloudness->setAttribute('style', $temp.'; background-repeat:no-repeat; height: 55px; background-position: center;');
			$temperature = $dom->find('div.temp')->find('dd');
			$data['cloudness'] = $cloudness;
			$data['cloudness_w'] = $cloudness_w;
			$data['temperature'] = $temperature;
			return $data;
		}

		else			
		{
			return "unable to fetch data, please refresh page";
		}
		/*	
		return array(
			
			array(
				'Year' => '2012',
				'Site' => 'http://DunkelBeer.ru',
				'Description' => 'Промо-сайт темного пива Dunkel от немецкого производителя Löwenbraü выпускаемого в России пивоваренной компанией "CАН ИнБев".'
			),
			array(
				'Year' => '2012',
				'Site' => 'http://ZopoMobile.ru',
				'Description' => 'Русскоязычный каталог китайских телефонов компании Zopo на базе Android OS и аксессуаров к ним.'
			),
			// todo
		);
		*/
	}
}