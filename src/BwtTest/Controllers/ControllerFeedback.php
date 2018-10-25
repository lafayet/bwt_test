<?php

namespace BwtTest\Controllers;

use BwtTest\Views\View;
use BwtTest\Validate;

class ControllerFeedback extends Controller
{

    public function __construct($model_class)
    {
        session_start();
        $this->model = $model_class;
        $this->view = new View();
    }
    
    public function actionIndex()
    {
        $data['hide'] = false;
        if (isset($_SESSION['uid'])) {
            $data['hide'] = true;
            
            if (isset($_POST['feedback'])) {
                $length_ok = Validate::isLenghtValid($_POST['feedback'], 500);
                if ($length_ok and $this->model->setData(
                    '',
                    '',
                    $_POST['feedback'],
                    $_POST['g-recaptcha-response'],
                    $_SERVER['REMOTE_ADDR'],
                    $_SESSION['uid']
                )) {
                    header('Location:/bwt_test/main/');
                } else {
                    echo "something wrong";
                }
            }
        } else {
            $data['hide'] = false;
            
            if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['feedback'])) {
                if (Validate::isLenghtValid($_POST['name'], 20) &&
                    Validate::isLenghtValid($_POST['email'], 30) &&
                    Validate::isLenghtValid($_POST['feedback'], 500)
                ) {
                    if ($this->model->setData(
                        $_POST['name'],
                        $_POST['email'],
                        $_POST['feedback'],
                        $_POST['g-recaptcha-response'],
                        $_SERVER['REMOTE_ADDR'],
                        2
                    )) {
                        header('Location:/bwt_test/login/');
                    } else {
                        echo "something wrong";
                    }
                }
            }
        }
        $this->view->generate('ViewFeedback.php', 'ViewTemplate.php', $data);
    }
}
