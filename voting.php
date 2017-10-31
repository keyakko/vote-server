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
		$req = htmlspecialchars($_REQUEST['vote']);
		if (!empty($req)) {
			$this->sql->sql_exec(
				"SELECT count(*) AS cnt FROM user WHERE id = ?",
				"user",
				array(
					$req
				)
			);
			if ($this->sql->user->val[0]["cnt"] == 1) {
				$this->sql->sql_exec(
					"INSERT INTO vote (user_id, created, ip) VALUES (?, NOW(), ?)",
					"voting",
					array(
						$req,
						$_SERVER['REMOTE_ADDR']
					)
				);
			}
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



