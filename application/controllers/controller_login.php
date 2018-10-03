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
			$mysqli = new mysqli("localhost", "root", "", "bwt_test_db");
			$resque = $mysqli->query('SELECT passwordhash FROM users WHERE login = "'.$login.'"');
			//надо добавить проверку результата запроса на тип данных (может быть булевым)
			$my_hash = $resque->fetch_assoc()['passwordhash'];
			
			
			if (password_verify ($password , $my_hash))
			{
				//echo 'pasword matches';
				$data["login_status"] = "access_granted";
				session_start();
				$_SESSION['admin'] = $password;
				//header('Location:/bwt_test/admin/');
			}
			else
			{
				//echo "wrong password or login";
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
				/* Вот это все позже надо будет перетащить в модель */
				$my_hash = password_hash($password, PASSWORD_DEFAULT);
				$mysqli = new mysqli("localhost", "root", "", "bwt_test_db");
				$mysqli->query('SET NAMES UTF8');
				if (!$mysqli->query("INSERT INTO users (Login, PasswordHash, Name, Soname, Email, Gender, DateOfBirth) VALUES ('".$login."', '".$my_hash."', '".$name."', '".$soname."', '".$email."', '".$sex."', '".$birthday."')"))
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
