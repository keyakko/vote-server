<?php
require_once("../sql.php");


class result {
	function __construct() {
		$this->sql_init();
		$this->receive_json($this->get_data());
	}
	
	function sql_init() {
		$this->sql = new sql();
		$this->sql->init_sql();
		return;
	}

	function get_data() {
		$sql = <<<SQL
SELECT us.name, count(*) AS total FROM vote.vote AS vo
LEFT JOIN vote.user AS us ON us.id = vo.user_id
WHERE us.disabled = 0
GROUP BY us.id
SQL;
		$this->sql->sql_exec($sql, "result", array());
		
		
		
		$arr = array();
		$label = array();
		$color = array();
		$data = array();
		$colorset = array(
			"rgba(255, 99, 132, 1)",
			"rgba(255, 159, 64, 1)",
			"rgba(255, 205, 86, 1)",
			"rgba(75, 192, 192, 1)",
			"rgba(54, 162, 235, 1)",
		);
		$i = 0;
		foreach ($this->sql->result->val as $val) {
			$data[] = $val["total"];
			$label[] = $val["name"];
			$color[] = $colorset[($i++) % 5];
			
		}
		
		$ret = new stdClass();
		$ret->data = $data;
		$ret->label = $label;
		$ret->color = $color;
		
		return $ret;
	}
	
	function receive_json($data){
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($data);
		exit;
	}
	
}
new result();




?>



