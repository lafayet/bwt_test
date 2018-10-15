<?php

namespace BwtTest\Controllers;

class ControllerFeedbacks extends Controller
{
    public function actionIndex()
    {
        $data = $this->model->getData();
        $this->view->generate('ViewFeedbacks.php', 'ViewTemplate.php', $data);
    }
}
