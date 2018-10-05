<?php

class Controller_Main extends Controller
{	

	function __construct()
	{
		session_start();
		if (isset($_SESSION['uid']))
		{
			$this->view = new View();		
		}
		else
		{
			header('Location:/bwt_test/login/');
		}
	}
	
	function action_index()
	{
		$data["login_status"] = "access_granted";
		$this->view->generate('view_main.php', 'view_template.php', $data);
	}
}