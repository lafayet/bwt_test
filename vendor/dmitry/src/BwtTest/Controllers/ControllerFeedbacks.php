<?php

namespace BwtTest\Controllers;

class ControllerFeedbacks extends MController
{
    public function actionIndex()
    {
        $data = $this->model->get_data();
        $this->view->generate('view_feedbacks.php', 'view_template.php', $data);
    }
}
