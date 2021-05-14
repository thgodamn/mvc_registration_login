<?php

class Controller_Register extends Controller
{
	function __construct()
	{
		$this->model = new Model_Register();
		$this->view = new View();
		$this->login = new Model_Login();
	}
	
	function action_index()
	{	
		$data['register_status'] = '';
		if ( isset($_POST["fio"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) && isset($_POST["btn"]) && isset($_POST["phone"]) && isset($_POST["password"]) && isset($_POST["password2"]) && $_POST["password"] == $_POST["password2"] && isset($_POST["address_city"]) && isset($_POST["address_obl"]) && isset($_POST["address_region"]) && isset($_POST["address_ulitsya"]) && preg_match("/^[0-9]{10,11}+$/", $_POST['phone']) ) {
			$arr = array('fio' => $_POST["fio"], 'email' => $_POST["email"], 'address' => $_POST["address_obl"].', '.$_POST["address_city"].', '.$_POST["address_region"].', '.$_POST["address_ulitsya"], 'phone' => $_POST["phone"], 'password' => strval(md5($_POST["password"])), 'verify' => 'no', 'coordinates' => $_SERVER['REMOTE_ADDR']);
			if ($this->model->register($arr)) $data['register_status'] = 'good_register';
			else $data['register_status'] = 'bad_register';
		} else if(isset($_POST["btn"])) $data['register_status'] = 'bad_register';
		if ($this->login->is_login()) $data['is_login'] = true;
		$this->view->generate('register_view.php', 'template_view.php', $data);
	}
	
}

?>
