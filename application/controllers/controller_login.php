<?php

class Controller_Login extends Controller
{
	
	function __construct()
	{
		$this->model = new Model_Login();
		$this->view = new View();
	}	
	
	function action_index()
	{
		if(isset($_POST['login']) && isset($_POST['password']))
		{
			if ($this->model->login($_POST['login'], $_POST['password']))
			{
				$data["login_status"] = "access_granted";
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
		if(isset($_POST['login']) && isset($_POST['password']))
		{
			$login = $_POST['login'];
			$password = $_POST['password'];
			$name = $_POST['name'];
			$soname = $_POST['soname'];
			$sex = $_POST['sex'];
			$birthday = $_POST['birthday'];
			$email = $_POST['email'];
			
			if($login!="" && $password!="")
			{
				
				if (!$this->model->register($login, $password, $name, $soname, $sex, $birthday, $email))
				{
					echo "User already exists!";
					echo '<a href="http://localhost/bwt_test/login/register">Назад</a>';
				}
				else
				{
					header('Location:/bwt_test/login/');
				}
			}
			else
			{
				$data["register_status"] = "wrong_credentials";
				$data["login_status"] = "registering";
			}
		}
		else
		{
			$data["login_status"] = "registering";
			$this->view->generate('view_login.php', 'view_template.php', $data);
		}
		
	}	
}
