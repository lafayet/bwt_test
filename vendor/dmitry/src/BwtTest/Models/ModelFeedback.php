<?php

namespace BwtTest\Models;

use ReCaptcha\ReCaptcha;
use PDO;

class ModelFeedback extends Model
{
    public function setData($name, $email, $feedback, $reCaptchaResp, $serv, $uid)
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
            return InterfaceDB::createNewFeedback($name, $email, $feedback, $uid);
        } else {
            return false;
        }
    }
}
