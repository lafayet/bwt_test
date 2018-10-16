<?php

namespace BwtTest\Controllers;

class ControllerWeather extends Controller
{
    public function actionIndex()
    {
        $data = $this->model->getData();
        $this->view->generate('ViewWeather.php', 'ViewTemplate.php', $data);
    }
}
