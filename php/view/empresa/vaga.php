<?php
require_once "../../php/dao/Empresa.php";
require_once "../../php/Session.php";
require_once "../../php/dao/Dao.php";
require_once "../../php/dao/Vaga.php";


$vaga_id = $_GET['id'];

$participantes = (new Vaga())->participantes($vaga_id);

Session::handle('empresa');

$model = Session::get('model');

//$info = (new Empresa())->info($model->empresa_id)[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Área do Empresa</title>
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container theme-showcase" role="main">
		<div class="container-fuid">
			<div class="page-header">
				<h1>Área da Empresa</h1>
				<a href='../../php/login.php'>
					<div class='btn btn-primary'><span>Sair</span></div>
				</a>
			</div>
			<?php foreach($participantes as $participante){
				echo $participante->nome;
				echo "<a href='../estudante/curriculo.php?id={$participante->estudante_id}' target='_blank'>Curriculo</a>";
				echo '<br>';
			}?>
	</div>
	</div>
</body>

</html>