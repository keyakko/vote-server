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
            <a class="nav-link" href="index.php">ホーム <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="vote.php">投票ページ</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="result.php">投票結果</a>
          </li>
        </ul>
      </div>
    </nav>
</header>

<div class="jumbotron">
	<div class="container">
		<h1 class="display-5">投票結果</h1>
		<p>現在の投票状況を見ることができます</p>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<p>投票の時間遷移</p>
					<canvas id="graph"></canvas>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<footer>
		&copy; copyright cosylab all rights reserved.
	</footer>
</div>
<script>
$(function () {
	var ctx = $("#graph").getContext("2d");
	window.myBar = new Chart(ctx, {
		type: 'bar',
		data: barChartData,
		options: {
			responsive: true,
			legend: {
				position: 'top',
			},
			title: {
				display: true,
				text: 'Chart.js Bar Chart'
			}
		}
	});
});

</script>

<?php include("footer.php"); ?>