<?php

class Controller_Login extends Controller
{
	
	function action_index()
	{
		//$data["login_status"] = "";

		if(isset($_POST['login']) && isset($_POST['password']))
		{
			$login = $_POST['login'];
			$password =$_POST['password'];
			
			/*
			Производим аутентификацию, сравнивая полученные значения со значениями прописанными в коде.
			Такое решение не верно с точки зрения безопсаности и сделано для упрощения примера.
			Логин и пароль должны храниться в БД, причем пароль должен быть захеширован.
			*/
			if($login=="admin" && $password=="12345")
			{
				$data["login_status"] = "access_granted";
				
				session_start(); //echo $_SESSION['admin'];
				$_SESSION['admin'] = $password;
				//header('Location:/bwt_test/admin/');
			}
			else
			{
				$data["login_status"] = "access_denied";
			}
		}
		else
		{
			$data["login_status"] = "logging_in";
		}
		
		$this->view->generate('view_login.php', 'view_template.php', $data);
	}
	
	function action_register()
	{
		$data["login_status"] = "registering";
		$this->view->generate('view_login.php', 'view_template.php', $data);
	}	
}
