<?php
require_once "../php/controller/Estudante.php";
require_once "../php/controller/Prova.php";
require_once "../php/Session.php";
require_once "../php/dao/Dao.php";

Session::handle('estudante');
/*
$model = Session::get('model');*/
$prova = (new Vaga())->prova($args[1]);
$perguntas = (new Prova())->perguntas($prova[0]->prova_id);

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
	<script src="/js/prova-estudante.js"></script>	
</head>

<body>
<div class='timer'><span>Tempo restante: </span><span id='timer'></span></div>
	<div class="container theme-showcase" role="main">
		<div class="container-fuid">
			<div class="page-header">
				<h1>Área da Estudante</h1>
				<a href='/estudante/login'>
					<div class='btn btn-primary'><span>Sair</span></div>
				</a>
			</div>
			<div class='content'>
				<div class='prova'>
					<form name='prova' method='POST' action='/estudante/prova/<?php echo $prova[0]->prova_id; ?>'>
						<?php foreach($perguntas as $pergunta){
							echo "<div class='pergunta'>";
							echo "<p>{$pergunta->texto}</p>";
							$respostas = (new Prova())->respostas($pergunta->pergunta_id);

							foreach($respostas as $resposta){
								echo "<input type='radio' name=resposta[{$pergunta->pergunta_id}] value='{$resposta->resposta_id}'>{$resposta->texto}<br>";
							}
							echo "</div>";
						} ?>

						<button type='submit' class='btn btn-primary'>Salvar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>