<?php

namespace BwtTest\Models;

use GuzzleHttp\Client;
use PHPHtmlParser\Dom;

class ModelWeather extends Model
{
    public function getData()
    {
        //init $data
        $data['cloudness'] = "Нет данных с gismeteo.ua, ";
        $data['cloudness_w'] = "попробуйте обновить страницу.";
        $data['temperature'] = " ";
        $data['weather'] = " ";
        
        //creating new Guzzle client and getting page
        $client = new Client();
        try {
            $res = $client->request('GET', 'https://www.gismeteo.ua/weather-zaporizhia-5093/', [
                'headers' => ['User-Agent' => 'testing/1.0',
                              'Accept'     => 'text/html']]
            );
            if ($res->getStatusCode() == 200) {
                //parsing page
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
                $weather = $dom->find('div.wsection');
                $temp = $weather->find('table');
                $temp->setAttribute('style', 'width: 474px;');
                $temp->setAttribute('align', 'center');
                $temp = $weather->find('thead');
                $temp->setAttribute('style', 'font-size: 9px;');
                
                //preparing data for view
                $data['cloudness'] = $cloudness;
                $data['cloudness_w'] = $cloudness_w;
                $data['temperature'] = $temperature;
                $data['weather'] = $weather;
            }
        } catch (Exception $e) {
            //if no data -> do nothing
        }
        return $data;
    }
}
