<?php include("header.php"); ?>
<header>
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
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="検索できないフォーム" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
        </form>
      </div>
    </nav>
</header>

<div class="jumbotron">
	<div class="container">
		<h1 class="display-5">ほげ</h1>
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
							<label>誰に投票する？</label>
							<select class="form-control" name="vote">
								<option value="surval">サーバル</option>
								<option value="feneck">フェネック</option>
								<option value="arai">アライグマ</option>
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