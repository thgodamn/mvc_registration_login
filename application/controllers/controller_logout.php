<?php

class Controller_Logout extends Controller
{
	function action_index()
	{
		session_destroy();
		session_start();
		header('Location:/login');
	}
	
}

?>