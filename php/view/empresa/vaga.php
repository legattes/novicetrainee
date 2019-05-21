<?php
require_once "../php/controller/Empresa.php";
require_once "../php/model/Vaga.php";
require_once "../php/Session.php";
require_once "../php/dao/Dao.php";

Session::handle('empresa');

$participantes = (new Vaga())->participantes($args[1]);
/*
$model = Session::get('model');*/

//$info = (new Empresa())->info($model->empresa_id)[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Área da Empresa</title>
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container theme-showcase" role="main">
		<div class="container-fuid">
			<div class="page-header">
				<h1>Área da Empresa</h1>
				<a href='/empresa/login'>
					<div class='btn btn-primary'><span>Sair</span></div>
				</a>
			</div>
			<div class='content'>
			<table class="table">
			<tr>
				<th>Estudante</th>
			</tr>
				<?php foreach($participantes as $participante){
					echo '<tr>';
					echo "<td>{$participante->nome}</td>";
					echo "<td><a href='/estudante/curriculo/1' target='_blank'><div class='btn btn-primary'>Curriculo</div></a></td>";
					echo "<td><div class='btn btn-primary'>Prova</div></td>";
					echo '</tr>';
				}?>

			</table>
			</div>
		</div>
	</div>
</body>

</html>