<?php

class Model_Login extends Model
{
	public function login($login, $password)
	{
		$mysqli = new mysqli("localhost", "root", "", "bwt_test_db");
		$resque = $mysqli->query('SELECT passwordhash FROM users WHERE login = "'.$login.'"');
		//надо добавить проверку результата запроса на тип данных (может быть булевым)
		$my_hash = $resque->fetch_assoc()['passwordhash'];
		
		
		if (password_verify ($password , $my_hash))
		{
			session_start();
			$_SESSION['uid'] = $login;
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function register($login, $password, $name, $soname, $email, $sex = "NULL", $birthday = "NULL")
	{
		$my_hash = password_hash($password, PASSWORD_DEFAULT);
		$mysqli = new mysqli("localhost", "root", "", "bwt_test_db");
		$mysqli->query('SET NAMES UTF8');
		if (!$mysqli->query("INSERT INTO users (Login, PasswordHash, Name, Soname, Email, Gender, DateOfBirth) VALUES ('".$login."', '".$my_hash."', '".$name."', '".$soname."', '".$email."', '".$sex."', '".$birthday."')"))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
}