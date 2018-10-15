<?php

namespace BwtTest\Controllers;

class ControllerMain extends Controller
{
    public function actionIndex()
    {
        $data["name"] = $_SESSION['name'];
        $this->view->generate('view_main.php', 'view_template.php', $data);
    }
}