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
				<!--<li class="list-group-item">Cras justo odio</li>-->
				<?php
					if (isset($_GET['id'])) {
						$id = $_GET['id'];
						require_once 'sql.php';
						$plugins = new MyMysqli("localhost", "user", "pass", "db");
						$arr = $plugins->getPlugin($id);
					if ($arr['1'] != null) {
						header("Location: https://rocketbr.com/pp/index");
					} else {
						$nome = $arr['nome'];
						$id = $arr['id'];
						$versao = $arr['versao'];
						$versaosv = $arr['versaosv'];
						$autor = $arr['autor'];
						$info = $arr['info'];
						echo '<li style="color:black;" class="list-group-item">Nome: ' . $nome . '</li>';
						echo '<li style="color:black;" class="list-group-item">ID: ' . $id . '</li>';
						echo '<li style="color:black;" class="list-group-item">Versao: ' . $versao . '</li>';
						echo '<li style="color:black;" class="list-group-item">Versao do minecraft: ' . $versaosv . '</li>';
						echo '<li style="color:black;" class="list-group-item">Autor: ' . $autor . '</li>';
						echo '<li style="color:black;" class="list-group-item">Info: ' . $info . '</li>';
					}
				}
				?>
			</ul>
		</div>
	</div>
</div>
</div>
</body></html>