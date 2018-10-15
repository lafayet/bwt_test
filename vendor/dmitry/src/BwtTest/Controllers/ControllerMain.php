<?php

namespace BwtTest\Controllers;

class ControllerMain extends Controller 
{
    public function actionIndex()
    {
        $data["name"] = $_SESSION['name'];
        $this->view->generate('ViewMain.php', 'ViewTemplate.php', $data);
    }
}