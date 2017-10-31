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
		$colorset = array(
			window.chartColors.red,
			window.chartColors.orange,
			window.chartColors.yellow,
			window.chartColors.green,
			window.chartColors.blue,
		);
		
		foreach ($this->sql->result->val as $val) {
			$data = new stdClass();
			$label[] = $val["name"];
			$data->
			
		}
		
		return $this->sql->result->val;
	}
	
	function receive_json($data){
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($data);
		exit;
	}
	
}
new result();




?>



