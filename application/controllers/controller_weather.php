<?php

class Controller_Weather extends MController
{	
	function action_index()
	{
		$data = $this->model->get_data();		
		$this->view->generate('view_weather.php', 'view_template.php', $data);
	}
}