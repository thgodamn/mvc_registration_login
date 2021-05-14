<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Model_Register extends Model
{
	public function __construct() {
		$this->db = new DB();
	}
	public function register($data)
	{
		#проверяем существует ли пользователь с таким email
		$res = mysqli_query($this->db->conn(), 'SELECT * FROM `users` WHERE email = "'.$data['email'].'"');
		$row = mysqli_fetch_array($res);
		
		#узнаем геопозицию $json = file_get_contents('https://ipwhois.app/json/164.215.49.14');
		$json = file_get_contents('https://ipwhois.app/json/'.$data['coordinates']);
		$json_array = json_decode($json, true);
		
		#если пользователя не существут создадим его
		if (empty($row)) {
			$verify_code = md5($email.time());
			
			
			mysqli_query($this->db->conn(), "INSERT INTO `users`(`fio`, `email`, `phone`,`password`,`address`,`verify`,`coordinates`,`activation`) VALUES ('".$data['fio']."','".$data['email']."','".$data['phone']."','".$data['password']."','".$data['address']."','".$data['verify']."','".$json_array['longitude'].",".$json_array['latitude']."','".$verify_code."');" );
			
			// Настройки PHPMailer
			$mail = new PHPMailer();
			$mail->isSMTP();   
			$mail->CharSet = "UTF-8";
			$mail->SMTPAuth   = true;
			//$mail->SMTPDebug = 2;
			//$mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};
			//$mail->SMTPDebug = SMTP::DEBUG_SERVER;

			// Настройки вашей почты
			$mail->Host       = 'smtp.yandex.ru'; // SMTP сервера вашей почты
			$mail->Username   = 'name@yandex.ru'; // Логин на почте
			$mail->Password   = 'your_password'; // Пароль на почте
			$mail->SMTPSecure = 'ssl';
			$mail->Port       = 465;
			$mail->setFrom('name@yandex.ru', 'web'); // Адрес самой почты и имя отправителя

			// Получатель письма
			$mail->addAddress($data['email'],$data['fio']);  
			// Отправка сообщения
			$mail->isHTML(true);
			$mail->Subject = 'Верификация аккаунта';
			$mail->Body = "<p>URL-verify: ".$_SERVER['SERVER_NAME']."/activation?code=$verify_code</p>";    

			$mail->send();
			
			return true;
		} else return false;
	}
}

?>