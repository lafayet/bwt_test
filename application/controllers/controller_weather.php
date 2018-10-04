<?php

class Controller_Weather extends Controller
{

	function __construct()
	{
		session_start();
		if (isset($_SESSION['uid']))
		{
			$this->model = new Model_Weather();
			$this->view = new View();		
		}
		else
		{
			header('Location:/bwt_test/login/');
		}
	}
	
	function action_index()
	{
		$data = $this->model->get_data();		
		$this->view->generate('view_weather.php', 'view_template.php', $data);
	}
}