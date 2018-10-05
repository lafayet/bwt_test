<?php

class Controller_Main extends Controller
{	
	function action_index()
	{
		$data["login_status"] = "access_granted";
		$this->view->generate('view_main.php', 'view_template.php', $data);
	}
}