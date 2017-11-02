<?php include("header.php"); ?>
<?php
require_once("sql.php");


class vote {
	function __construct() {
		$this->sql_init();
		$this->get_user_list();
	}

	function sql_init() {
		$this->sql = new sql();
		$this->sql->init_sql();
		return;
	}

	function get_user_list() {
		$sql = "SELECT * FROM user WHERE disabled = 0";
		$this->sql->sql_exec($sql, "users", array());
		
		
	}
}
$vote = new vote();
?>
<header>
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="index.php">投票サイト</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">ホーム <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="vote.php">投票ページ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="result.php">投票結果</a>
          </li>
        </ul>
      </div>
    </nav>
</header>

<div class="jumbotron">
	<div class="container">
		<h1 class="display-5">第415回終議員議員葬選挙</h1>
		<p>投票ページ</p>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<p>下の投票欄から投票できます。</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<form action="voting.php" method="post">
						<div class="form-group">
							<label>比例代表制選挙</label>
							<select class="form-control" name="vote">
							
								<?php if (!empty($vote->sql->users->val)) { ?>
									<?php foreach ($vote->sql->users->val as $val) { ?>
										<option value="<?php echo $val["id"] ?>"><?php echo $val["name"] ?></option>
									<?php } ?>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-success" value="投票する">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<footer>
		&copy; copyright cosylab all rights reserved.
	</footer>
</div>


<?php include("footer.php"); ?>