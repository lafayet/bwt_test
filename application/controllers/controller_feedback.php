<?php

class Controller_Feedback extends MController
{	
	function action_index()
	{
		if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['feedback']))
		{
			if ($this->model->set_data($_POST['name'], $_POST['email'], $_POST['feedback'], $_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']))
			{
				header('Location:/bwt_test/main/');
			}
			else
			{
				echo "something wrong";
				//$data["login_status"] = "access_denied";
			}
		}
		
		$data = "";		
		$this->view->generate('view_feedback.php', 'view_template.php', $data);
	}
}