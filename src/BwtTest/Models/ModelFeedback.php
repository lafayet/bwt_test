<?php

namespace BwtTest\Models;

use ReCaptcha\ReCaptcha;

class ModelFeedback extends \BwtTest\Core\Model
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
            $IntDB = \BwtTest\Core\InterfaceDB::getInstance();
            return $IntDB->createNewFeedback($name, $email, $feedback, $uid);
        } else {
            return false;
        }
    }
}
