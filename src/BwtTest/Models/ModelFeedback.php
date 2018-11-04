<?php

namespace BwtTest\Models;

use ReCaptcha\ReCaptcha;
use BwtTest\Core\InterfaceDB;

class ModelFeedback extends \BwtTest\Core\Model
{
    public function setData($name, $email, $feedback, $reCaptchaResp, $serv, $uid)
    {
        
        //секретный ключ
        $ini = parse_ini_file(realpath('config.ini'));
        $secret = $ini["KeySrv"];
        //ответ
        $response = null;
        //проверка секретного ключа
        $reCaptcha = new ReCaptcha($secret);
        
        if ($reCaptchaResp) {
            $response = $reCaptcha->verify($reCaptchaResp, $serv);
        }
        
        if ($response != null && $response->isSuccess()) {
            $IntDB = InterfaceDB::getInstance();
            return $IntDB->createNewFeedback($name, $email, $feedback, $uid);
        } else {
            return false;
        }
    }
}
