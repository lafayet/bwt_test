<?php

class Controller_Feedback extends MController
{	
	function action_index()
	{
		$data = $this->model->get_data();		
		$this->view->generate('view_feedback.php', 'view_template.php', $data);
	}
}