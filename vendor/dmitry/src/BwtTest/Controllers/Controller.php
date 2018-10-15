<?php

namespace BwtTest\Controllers;

use BwtTest\Views\View;

class Controller 
{
    public $model;
    public $view;
    
    public function __construct($model)
    {
        session_start();
        if (isset($_SESSION['uid'])) {
            $this->model = $model;
            $this->view = new View();
        } else {
            header('Location:/bwt_test/login/');
        }
    }
    
    protected function actionIndex()
    {
    }
    
    public function actionLogout()
    {
        session_destroy();
        header('Location:/bwt_test/login/');
    }
}