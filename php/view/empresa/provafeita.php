<?php
require_once "../php/controller/Empresa.php";
require_once "../php/controller/Estudante.php";
require_once "../php/Session.php";
require_once "../php/dao/Dao.php";

Session::handle('empresa');

$model = Session::get('model');

$prova = (new Vaga())->prova($args[1])[0];
$estudante = (new Estudante())->get('estudante', $args[2])[0];
$provaFeita = (new Estudante())->provafeita($estudante->estudante_id, $prova->prova_id);

$perguntas = (new Prova())->perguntas($prova->prova_id);

$respostasEstudante = (new Estudante())->respostasProva($estudante->estudante_id, $prova->prova_id);

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
				<a href='/empresa/vaga/<?php echo $args[1]; ?>'>
					<div class='btn btn-primary'><span>Voltar</span></div>
				</a>
				<a href='/empresa/login'>
					<div class='btn btn-primary'><span>Sair</span></div>
				</a>
			</div>
			<div class='page-content'>
				<?php
				if ($provaFeita == []) {
					echo '<p>O estudante ainda não realizou a prova</p>';
				} else {
					echo "<h3>Prova feita por {$estudante->nome}</h3>";

					foreach ($perguntas as $pergunta) {
						echo "<div class='pergunta'>";
						echo "<p>Pergunta: {$pergunta->texto}</p>";

						//$respostas = (new Prova())->respostas($pergunta->pergunta_id);

						$respostas = (new Prova())->perguntaResposta($pergunta->pergunta_id);

						foreach ($respostasEstudante as $respEstud) {
							if($respEstud->pergunta_id == $pergunta->pergunta_id){
								foreach ($respostas as $resposta) {
									if ($resposta->resposta_id == $respEstud->resposta_id) {
										$class = ($resposta->correta == '1') ? "<span class='correct'>Correta</span>" : "<span class='wrong'>Errada</span>";
										echo "<span>Resposta: " . $resposta->texto . "</span>{$class}";
										break;
									}
								}
								break;
							}
							
						}
						
						/*foreach ($respostas as $resposta) {
							echo "<input type='radio' name=resposta[{$pergunta->pergunta_id}] value='{$resposta->resposta_id}'>{$resposta->texto}<br>";
						}*/
						echo "</div>";
					}
				}

				?>
			</div>
		</div>
	</div>
</body>

</html>