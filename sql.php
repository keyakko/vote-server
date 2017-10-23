<?php

/* ユーザ情報を入力 */
define('SQL_ADDR', '127.0.0.1');
define('SQL_USER', 'root');
define('SQL_PASS', 'root');
define('SQL_DBNAME', 'vote');


class sql {
	function init_sql() {
		try {
			$this->pdo = new PDO('mysql:host=' . SQL_ADDR . ';dbname=' . SQL_DBNAME . ';charset=utf8', SQL_USER, SQL_PASS,
						   array(PDO::ATTR_EMULATE_PREPARES => false));
		} catch (PDOException $e) {
			exit('データベース接続失敗。'.$e->getMessage());
		}
		return;
	}

	function sql_exec($sql, $name, $param) {
		$stmt = $this->pdo->prepare($sql);
		$i = 0;
		foreach($param as $val) {
			$i++;
			if (gettype($val) == 'integer') {
				$stmt->bindValue($i, $val, PDO::PARAM_INT);
			} else {
				$stmt->bindValue($i, $val, PDO::PARAM_STR);
			}
		}
		unset($val);
		$this->$name = new stdClass;
		$this->$name->result = $stmt->execute();
		$this->$name->val = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return;
	}

}