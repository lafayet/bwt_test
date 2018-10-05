<?php

class MController extends Controller {
	
	public $model;
	public $view;
	
	function __construct($model_class)
	{
		session_start();
		if (isset($_SESSION['uid'])) {
			$this->model = new $model_class();
			$this->view = new View();
		}
		else
		{
			header('Location:/bwt_test/login/');
		}
	}
}