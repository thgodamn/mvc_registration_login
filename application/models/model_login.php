<?php

function generateCode($length=6) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
	$code = "";
	$clen = strlen($chars) - 1;  
	while (strlen($code) < $length) {
		$code .= $chars[mt_rand(0,$clen)];  
	}
	return $code;
}

class Model_Login extends Model
{
	public function __construct() {
		$this->db = new DB();
	}
	public function login ($email = '', $pass = '')
	{
		$res = mysqli_query($this->db->conn(), "SELECT * FROM `users` WHERE email = '$email'");
		$row = mysqli_fetch_array($res);
		$hash = md5(generateCode(10));
		$ip = $_SERVER['REMOTE_ADDR'];
		if (isset($row) && strval(md5($pass)) == $row['password'] && $row['verify'] == 'yes') {
			$_SESSION['id'] = $row['id'];
			$_SESSION['ip'] = $ip;
			$_SESSION['hash'] = $hash;
			mysqli_query($this->db->conn(), "UPDATE users SET ip='$ip', hash='$hash' WHERE email='$email'");
		}
	}
	
	public function is_login ($email = '')
	{
		if (!empty($_SESSION)) {
			$res = mysqli_query($this->db->conn(), 'SELECT * FROM `users` WHERE id = '.$_SESSION['id']);
			$row = mysqli_fetch_array($res);
			if ($row['id'] == $_SESSION['id'] and $row['hash'] == $_SESSION['hash'] and $row['ip'] == $_SERVER['REMOTE_ADDR']) {
				if (($email == '') || ($email != '' && $email == $row['email']))
					return true;
				else return false;
			} else { return false; }
		} else { return false; }
	}
}

?>