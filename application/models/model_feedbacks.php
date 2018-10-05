<?php

class Model_Feedbacks extends Model
{
	public function get_data()
	{	
		$pdo = new PDO('mysql:host=localhost;dbname=bwt_test_db', 'root', '');
		$pdo->query('SET NAMES UTF8');
		$prep_req = $pdo->prepare('SELECT name, message FROM feedbacks2');
		$prep_req->execute();
		$data = $prep_req->fetchAll();
		return $data;
	}
}