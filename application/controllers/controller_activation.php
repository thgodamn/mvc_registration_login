<?php

class Controller_Activation extends Controller
{
	function __construct()
	{
		$this->model = new Model_Activation();
		$this->view = new View();
		$this->login = new Model_Login();
	}
	
	function action_index()
	{
		$data['activation_status'] = 'bad_activation';
		if (isset($_GET['code']) && $this->model->activation($_GET['code'])) $data['activation_status'] = 'good_activation';
		$this->view->generate('activation_view.php', 'template_view.php', $data);
	}
	
}

?>
