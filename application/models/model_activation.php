<?php

class Model_Activation extends Model
{
	public function __construct() {
		$this->db = new DB();
	}
	public function activation($code)
	{
		$res = mysqli_query($this->db->conn(), "SELECT * FROM `users` WHERE activation='$code'");
		$row = mysqli_fetch_array($res);
		
		if (!empty($row)) {
			mysqli_query($this->db->conn(), "UPDATE users SET verify='yes' WHERE activation='$code'");
			return true;
		} else return false;
	}
}

?>