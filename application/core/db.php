<?php
class DB{

	const USER = "root";
	const PASS = "your_pass";
	const HOST = "localhost";
	const DB   = "your_db";

	public static function conn() {

		$user = self::USER;
		$pass = self::PASS;
		$host = self::HOST;
		$db   = self::DB;

		$conn = mysqli_connect($host, $user, $pass, $db);
		if ($db == false)
			 die('Не удалось соединиться : ' . mysqli_error());
		else return $conn;

	}
}

?>