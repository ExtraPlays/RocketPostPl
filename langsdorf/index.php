<html>
<head>
	<meta charset="utf-8">
    <link href="https://rocketbr.com/assets/css/bootstrap.css" rel="stylesheet" />
<link href="https://rocketbr.com/assets/css/ionicons.css" rel="stylesheet" />
<link href="css/font-awesome.css" rel="stylesheet" />
<link href="https://rocketbr.com/assets/css/animations.min.css" rel="stylesheet" />
<link href="https://rocketbr.com/assets/css/animate.css" rel="stylesheet" />
<link href="https://rocketbr.com/assets/css/style-i.css" rel="stylesheet" />
<link rel="icon" type="image/png" href="https://rocketbr.com/img/favicon.ico" />
<script src="https://rocketbr.com/assets/js/jquery-1.11.1.js"></script>
<script src="https://rocketbr.com/assets/js/bootstrap.js"></script>
<script src="https://rocketbr.com/assets/js/jquery.easing.min.js"></script>
<script src="https://rocketbr.com/assets/js/jquery.isotope.js"></script>
<script src="https://rocketbr.com/assets/js/appear.min.js"></script>
<script src="https://rocketbr.com/assets/js/animations.min.js"></script>
</head>

<body>
<div class="navbar navbar-default navbar-static-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
			<span class="sr-only">Sla</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
			<a class="navbar-brand" href="#"><span>Langsdorf</span></a>
		</div>
		<div class="collapse navbar-collapse" id="navbar-ex-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="#">Home</a></li>
			</ul>
		</div>
	</div>
</div>
<div class="section">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="list-group">
				<?php
					require_once 'sql.php';
					$plugins = new MyMysqli("localhost", "user", "pass", "db");
					$quanti = $plugins->getPL();
					$quanti = $quanti + 1;
					for ($i = 0; $i < $quanti; $i++) {
						$arr = $plugins->getPlugin($i);
						if ($arr['1'] == null) {
								echo '<a href="https://rocketbr.com/pp/showPlugin?id=' . $i . '"><li class="list-group-item">' . $arr['id'] . '|' . $arr['nome'] . '|' . $arr['versao'] . '|' . $arr['autor'] . '|' . $arr['versaosv'] . '|' . strip_tags($arr['info']) . '</li></a>';
						}
					}
				?>
			</ul>
		</div>
	</div>
</div>
</div>
</body></html>