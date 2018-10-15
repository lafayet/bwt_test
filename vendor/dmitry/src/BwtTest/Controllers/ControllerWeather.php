<?php

namespace BwtTest\Controllers;

class ControllerWeather extends MController
{
    public function actionIndex()
    {
        $data = $this->model->get_data();        
        $this->view->generate('view_weather.php', 'view_template.php', $data);
    }
}