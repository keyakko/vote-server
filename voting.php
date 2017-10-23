<?php
require_once("sql.php");


class voting {
	function __construct() {
		$this->sql_init();
		$this->post_vote();
	}
	
	function sql_init() {
		$this->sql = new sql();
		$this->sql->init_sql();
		return;
	}

	function post_vote() {
		if (!empty($_REQUEST['vote'])) {
			$this->sql->sql_exec(
				"INSERT INTO vote (name, created, ip) VALUES (?, NOW(), ?)",
				"voting",
				array(
					$_REQUEST['vote'],
					$_SERVER['REMOTE_ADDR']
				)
			);
			if (!$this->sql->voting) {
				echo "Error! Please retry send your request.  LINE:". __LINE__;
				die;
			}
		} else {
			echo "Error! Please check your postdata and retry send your request. LINE:" . __LINE__;
			die;
		}
		header("location: complete.php");
		return;
	}
}
new voting();




?>



