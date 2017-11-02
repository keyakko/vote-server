<?php include("header.php"); ?>
<header>
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="index.php">投票サイト</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">ホーム</a>
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
		<h1 class="display-5">投票完了</h1>
		<p>投票ページ</p>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<p>投票が完了しました。ありがとうございました。</p>
		</div>
	</div>
	<hr>
	<footer>
		&copy; copyright cosylab all rights reserved.
	</footer>
</div>


<?php include("footer.php"); ?>