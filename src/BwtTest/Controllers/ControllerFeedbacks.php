<?php

namespace BwtTest\Controllers;

class ControllerFeedbacks extends \BwtTest\Core\Controller
{
    public function actionIndex()
    {
        $data = $this->model->getData();
        $this->view->generate('ViewFeedbacks.php', 'ViewTemplate.php', $data);
    }
}
