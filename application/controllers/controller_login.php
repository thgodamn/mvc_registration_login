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
		$data = [];
		if(isset($_POST['email']) && isset($_POST['password']))
		{
			$email = $_POST['email'];
			$password =$_POST['password'];
			$this->model->login($email,$password);
			
			if ($this->model->is_login()) {
				$data["login_status"] = 'access_granted';
				$data['is_login'] = true;
				header('Location:/');
			}
			else $data["login_status"] = 'access_denied';
		}else $data["login_status"] = '';
		if ($this->model->is_login()) $data['is_login'] = true;
		$this->view->generate('login_view.php', 'template_view.php', $data);
	}
	
}
?>