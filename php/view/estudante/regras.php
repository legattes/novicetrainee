<?php
require_once "../php/controller/Estudante.php";
require_once "../php/controller/Prova.php";
require_once "../php/controller/Vaga.php";
require_once "../php/Session.php";
require_once "../php/dao/Dao.php";

Session::handle('estudante');
/*
$model = Session::get('model');*/

/*if((new Prova())->validateToken($args[1]) == false){
	echo 'não será possivel realizar a prova';
	die();
}*/

//$info = (new Empresa())->info($model->empresa_id)[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Área do Estudante</title>
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/styles.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container theme-showcase" role="main">
		<div class="container-fuid">
			<div class="page-header">
				<h1>Área da Estudante</h1>
				<a href='/estudante/login'>
					<div class='btn btn-primary'><span>Sair</span></div>
				</a>
			</div>
			<div class='content'>
				<h2>Regras da prova</h2>

				<h4>A prova tem duração de 30 minutos.</h4>
				<h4>Você tem 01 tentativa.</h4>
				<h4>Todas as perguntas devem ser respondidas.</h4>
				<br><br>


				<a href='/estudante/prova/<?php echo $args[1]; ?>'>
					<div class='btn btn-primary'>Prova</div>
				</a>
			</div>
		</div>
	</div>
</body>

</html>