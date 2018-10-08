<?php

class Controller_Login extends Controller
{
	function __construct()
	{
		session_start();
		if (!isset($_SESSION['uid'])) {
			$this->model = new Model_Login();
			$this->view = new View();
		}
		else
		{
			header('Location:/bwt_test/main/');
		}
	}
	
	function action_index()
	{
		if(isset($_POST['login']) && isset($_POST['password']))
		{
			if ($this->model->login($_POST['login'], $_POST['password']))
			{
				header('Location:/bwt_test/main/');
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
		if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['soname']) && isset($_POST['email']))
		{
			$login = $_POST['login'];
			$password = $_POST['password'];
			$name = $_POST['name'];
			$soname = $_POST['soname'];
			$sex = $_POST['sex'];
			$birthday = $_POST['birthday'];
			$email = $_POST['email'];
			$ok = Validate::isLenghtValid($login, 20) && Validate::isLenghtValid($password, 20) 
				&& Validate::isLenghtValid($name, 30) && Validate::isLenghtValid(soname, 20)
				&& Validate::isLenghtValid($email, 30);
			
			if($ok)
			{
				
				if (!$this->model->register($login, $password, $name, $soname, $email, $sex, $birthday, $email))
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
		}
		$this->view->generate('view_login.php', 'view_template.php', $data);		
	}	
}
