<?php

use ReCaptcha\ReCaptcha;

class Model_Feedback extends Model
{
	public function set_data($name, $email, $feedback, $reCaptchaResp, $serv, $uid)
	{	
		
		//секретный ключ
		$secret = "6LepuHMUAAAAAHhTEoccdmCYGaUgcO0fGDXNJIti";
		//ответ
		$response = null;
		//проверка секретного ключа
		$reCaptcha = new ReCaptcha($secret);
		
		if ($reCaptchaResp) {
			$response = $reCaptcha->verify($reCaptchaResp, $serv);
		}
		
		if ($response != null && $response->isSuccess()) {
			$pdo = new PDO('mysql:host=localhost;dbname=bwt_test_db', 'root', '');
			$pdo->query('SET NAMES UTF8');
			$prep_req = $pdo->prepare('INSERT INTO feedbacks (name, email, message, userid)
			VALUES (:name, :email, :message, :uid)');
			if (
				!$prep_req->execute(array(
				':name' => $name,
				':email' => $email,
				':message' => $feedback,
				':uid' => $uid))
				)
			{
				return false;
			}
			else
			{
				return true;
			}
		} else {
			return false;
		}
	}
}