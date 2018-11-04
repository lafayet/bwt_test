<?php

namespace BwtTest\Controllers;

use BwtTest\Models\ModelWeather;

class ControllerWeather extends \BwtTest\Core\Controller
{
    public function actionIndex()
    {
        $this->model = new ModelWeather();
        $data = $this->model->getData();
        $this->view->generate('ViewWeather.php', 'ViewTemplate.php', $data);
    }
}
