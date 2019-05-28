<?php
require_once "../php/controller/Empresa.php";
require_once "../php/Session.php";

Session::handle('empresa');

$model = Session::get('model');

$prova = (new Vaga())->prova($args[1]);

//$info = (new Empresa())->info($model->empresa_id)[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Área da Empresa</title>

	<link rel="stylesheet" href="/css/styles.css">
	<link rel='stylesheet' href='/css/bootstrap.min.css'>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script type='text/javascript' src="/js/prova.js"></script>
</head>

<body>
	<div class="container theme-showcase" role="main">
		<div class="container-fuid">
			<div class="page-header">
				<h1>Área da Empresa</h1>
				<a href='/empresa'>
					<div class='btn btn-primary'><span>Voltar</span></div>
				</a>
				<a href='/empresa/login'>
					<div class='btn btn-primary'><span>Sair</span></div>
				</a>
			</div>
			<div class='content'>
				<?php if ($prova == []) { ?>
					<div class='btn btn-primary new-question'><span>Nova Questão</span></div>
					<br><br>
					<form name='prova' method='POST' action="/empresa/prova/<?php echo $args[1]; ?>">
						<div class='perguntas'>
						</div>
						<button type='submit' class='btn btn-primary'>Salvar</button>
					</form>
				<?php } else {
				$perguntas = (new Prova())->perguntas($prova[0]->prova_id);

				foreach ($perguntas as $pergunta) {
					echo "<div class='pergunta'>";
					echo "<p>Pergunta: {$pergunta->texto}</p>";
					$respostas = (new Prova())->respostas($pergunta->pergunta_id);

					$i = 1;

					foreach ($respostas as $resposta) {
						echo "<p>Resposta {$i}: {$resposta->texto}</p>";
						$i++;
					}
					echo "</div>";
				}
			}
			?>
			</div>
		</div>
	</div>
</body>

</html>