<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bwt Test</title>

    <!-- Bootstrap -->
    <link href="libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="libs/bootstrap/js/bootstrap.min.js"></script>
	
	
  </head>
  <body>
	<div class="container-fluid">
		<h1>Welcome at our BWT test-site</h1>
	</div>
	<div class="container">
		<h2>Please register or login to view contents</h2>
		<?php
			require_once "vendor/autoload.php";
			use GuzzleHttp\Client;
			$client = new Client();
			$res = $client->request('GET', 'https://www.gismeteo.ua/weather-zaporizhia-5093/', [
				'headers' => ['User-Agent' => 'testing/1.0',
							  'Accept'     => 'text/html']]
			);
			//echo $res->getStatusCode();
			// 200
			//echo $res->getHeaderLine('content-type');
			// 'application/json; charset=utf8'
			//echo $res->getBody();
			// '{"id": 1420053, "name": "guzzle", ...}'
			$test = (string)$res->getBody();
			use PHPHtmlParser\Dom;
			$dom = new Dom;
			$dom->setOptions([
				'enforceEncoding' => 'utf-8',
			]);
			$dom->load($test);
			echo $dom->getElementById('weather');
			//echo count($contents); // 10
		?>
</div>
  </body>
</html>