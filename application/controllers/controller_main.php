<?php

class Controller_Main extends Controller
{
	function __construct()
	{
		$this->model = new Model_Main();
		$this->view = new View();
		$this->login = new Model_Login();
	}
	
	function action_index()
	{
		parse_str(html_entity_decode($_SERVER["QUERY_STRING"]), $q);
		$q_pagination = 0;
		$q_sort = 0;
		$qis_login = false;
		
		if (!empty($q) && !empty($q['p']) && intval($q['p']) > 0 )
			$q_pagination = intval($q['p'])-1;
		if (!empty($q) && !empty($q['s']) && in_array($q['s'], array(0,1,2,3,4,5)) )
			$q_sort = $q['s'];
		if ($this->login->is_login()) $qis_login = true;
		
		$data = $this->model->get_data($pagination = $q_pagination, $sort = $q_sort, $is_login = $qis_login);
		$this->view->generate('main_view.php', 'template_view.php', $data);
	}
	
}

?>