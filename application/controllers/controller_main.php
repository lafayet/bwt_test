<?php

class Controller_Main extends Controller
{	
	function action_index()
	{
		$data["name"] = $_SESSION['name'];
		$this->view->generate('view_main.php', 'view_template.php', $data);
	}
}