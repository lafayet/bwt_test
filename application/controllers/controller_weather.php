<?php

class Controller_Weather extends Controller
{

	function __construct()
	{
		$this->model = new Model_Weather();
		$this->view = new View();
	}
	
	function action_index()
	{
		$data = $this->model->get_data();		
		$this->view->generate('view_weather.php', 'view_template.php', $data);
	}
}