<?php include("header.php"); ?>
<?php
require_once("sql.php");


class info {
	function __construct() {
		$this->sql_init();
		$this->get_info();
	}

	function sql_init() {
		$this->sql = new sql();
		$this->sql->init_sql();
		return;
	}

	function get_info() {
		$sql = "SELECT * FROM user WHERE disabled = 0";
		$this->sql->sql_exec($sql, "users", array());
	}
}
$info = new info();


?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="index.php">投票サイト</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
	<ul class="navbar-nav mr-auto">
	  <li class="nav-item active">
		<a class="nav-link" href="index.php">ホーム <span class="sr-only">(current)</span></a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" href="vote.php">投票ページ</a>
	  </li>
	  <li class="nav-item">
            <a class="nav-link" href="result.php">投票結果</a>
	  </li>
	</ul>
  </div>
</nav>


<div class="jumbotron">
	<div class="container">
		<h1 class="display-3">投票できそう！</h1>
		<p>投票サイトのテストページです。</p>
		<p><a class="btn btn-primary btn-lg" href="vote.php" role="button">今すぐ投票する »</a></p>
	</div>
</div>
<div class="container">
	<div class="row">
		<?php if (!empty($info->sql->users->val)) { $i = 0; ?>
			<?php foreach($info->sql->users->val as $val) { ?>
				<div class="col-md-4">
					<h2><?php echo $val["name"] ?></h2>
					<p><?php echo $val["description"] ?></p>
					<p><a class="btn btn-secondary" href="desc.php?id=<?php echo $val["id"] ?>" role="button">続きを読む »</a></p>
				</div>
				<?php if($i != 2) $i++; else break; ?>
			<?php } ?>
		<?php } else { ?>
			
		<?php } ?>
	</div>
	<hr>
	<footer>
		&copy; copyright cosylab all rights reserved.
	</footer>
</div>


<?php include("footer.php"); ?>