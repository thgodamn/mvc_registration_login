<?php

class Model_Main extends Model
{
	public function __construct() {
		$this->db = new DB();
	}
	public function get_data($pagination = 0, $sort = 0, $is_login = false)
	{
		if ($sort == 0) $sort_str = 'ORDER BY fio DESC';
		elseif ($sort == 1) $sort_str = 'ORDER BY fio';
		elseif ($sort == 2) $sort_str = 'ORDER BY email DESC';
		elseif ($sort == 3) $sort_str = 'ORDER BY email';
		elseif ($sort == 4) $sort_str = 'ORDER BY phone DESC';
		elseif ($sort == 5) $sort_str = 'ORDER BY phone';
		$data = mysqli_query($this->db->conn(), 'SELECT * FROM `users` '.$sort_str.' LIMIT '.($pagination*10).', 10');
		
		//количество страниц
		$res = mysqli_query($this->db->conn(), 'SELECT COUNT(*) FROM `users`');
		$row = mysqli_fetch_array($res);
		$count_pages = intval($row["COUNT(*)"]);
		
		$output = [];
		while ($row=mysqli_fetch_array($data)) {
			array_push($output, $row);
		}
		return ['is_login' => $is_login, 'table' => $output, 'count_pages' => $count_pages];
	}
}

?>