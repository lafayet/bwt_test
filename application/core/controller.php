<?php

class Controller {
	
	public $model;
	public $view;
	
	function __construct()
	{
		session_start();
		if (isset($_SESSION['uid'])) {
			$this->view = new View();
		}
		else
		{
			header('Location:/bwt_test/login/');
		}
	}
	
	function action_index()
	{
	}
}