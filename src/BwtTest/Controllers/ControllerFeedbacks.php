<?php

namespace BwtTest\Controllers;

use BwtTest\Models\ModelFeedbacks;

class ControllerFeedbacks extends \BwtTest\Core\Controller
{
    public function actionIndex()
    {
        $this->model = new ModelFeedbacks();
        $data = $this->model->getData();
        $this->view->generate('ViewFeedbacks.php', 'ViewTemplate.php', $data);
    }
}
