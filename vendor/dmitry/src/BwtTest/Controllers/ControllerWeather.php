<?php

namespace BwtTest\Controllers;

use BwtTest\Models\ModelWeather;

class ControllerWeather extends MController
{
    public function actionIndex()
    {
        $data = $this->model->get_data();        
        $this->view->generate('ViewWeather.php', 'ViewTemplate.php', $data);
    }
}