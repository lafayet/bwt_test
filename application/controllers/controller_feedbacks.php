<?php

class Controller_Feedbacks extends MController
{	
	function action_index()
	{
		$data = $this->model->get_data();		
		$this->view->generate('view_feedbacks.php', 'view_template.php', $data);
	}
}