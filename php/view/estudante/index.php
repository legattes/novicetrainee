<?php
require_once "../php/controller/Estudante.php";
require_once "../php/Session.php";

Session::handle('estudante');

$model = Session::get('model');

$vagas = (new Estudante())->vagas($model->estudante_id);
$participando = (new Estudante())->participando($model->estudante_id);

$info = (new Estudante())->info($model->estudante_id)[0];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Área do Estudante</title>
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/styles.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container theme-showcase" role="main">
		<div class="container-fuid">
			<div class="page-header">
				<h1>Área do Estudante</h1>
				<a href='/estudante/login'>
					<div class='btn btn-primary'><span>Sair</span></div>
				</a>
				<a href='/estudante/curriculo' target='_blank'>
					<div class='btn btn-primary'><span>Currículo</span></div>
				</a>
			</div>
			<div>

				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="pill">Home</a></li>
					<!-- <li role="presentation"><a href="#conhecimentos" aria-controls="conhecimentos" role="tab" data-toggle="pill">Conhecimentos</a></li> -->
					<li role="presentation"><a href="#atDados" aria-controls="atDados" role="tab" data-toggle="pill">Atualizar Dados</a></li>
					<li role="presentation"><a href="#vagasDisp" aria-controls="vagasDisp" role="tab" data-toggle="pill">Vagas Disponíveis</a></li>
				</ul>

				<!-- Home -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="home">
						<center>
							<h2>
								<?php
								echo 'Olá, ' . $model->nome;
								?>

							</h2>
							<br>
							<h3>Vagas inscritas</h3>
							<table class="table">
								<tr>
									<th>Vaga</th>
									<th>Empresa</th>
									<th>Remuneração</th>
									<th>Período</th>
								</tr>
								<?php

								foreach ($participando as $vaga) {
									echo '<tr>';
									echo "<td>{$vaga->nome}</td>";
									echo "<td>{$vaga->nome_fantasia}</td>";
									echo "<td>{$vaga->remuneracao}</td>";
									echo "<td>{$vaga->periodo}</td>";
									echo "<td><a href='/estudante/regras/{$vaga->vaga_id}'><div class='btn btn-primary'>Prova</div></a></td>";
									echo '</tr>';
								}
								?>
							</table>
						</center>
					</div>


					<!-- ATUALiZAR DADOS -->

					<div role="tabpanel" class="tab-pane" id="atDados">
						<form id="formulario" method="POST" action="/estudante/edit">
							<div id="Escolaridade">
								<h2> Escolaridade</h2>
								<p>Instituição<select name="instituicao">
										<?php
										$instituicoes = (new Dao())->get('instituicao');
										foreach ($instituicoes as $instituicao) {
											echo "<option value='{$instituicao->instituicao_id}'" . (($instituicao->nome == $info->instituicao) ? 'selected' : '') . ">{$instituicao->nome}</option>";
										}
										?>
									</select>
								</p>
								<p>Curso<select name="instituicao[curso_id]">
										<?php
										$cursos = (new Dao())->get('curso');
										foreach ($cursos as $curso) {
											echo "<option value='{$curso->curso_id}'" . (($curso->nome == $info->curso_nome) ? 'selected' : '') . ">{$curso->nome}</option>";
										}
										?>
									</select></p>
								<p>RA<input type="text" name="instituicao[RA]" value="<?php echo $info->RA; ?>"></p>
								<p>Semestre<input type="text" name="instituicao[semestre]" value="<?php echo $info->semestre; ?>"></p>
								<p>Periodo<select name="instituicao[periodo]">
										<option value='Manha'>Manhã</option>
										<option value='Tarde'>Tarde</option>
										<option value='Noite'>Noite</option>
									</select></p>
							</div>

							<div id="endereco">
								<h2>Endereço</h2>
								<p>Cidade<input type="text" name="endereco[cidade]" value="<?php echo $info->cidade; ?>"></p>
								<p>Estado
									<select name="endereco[estado]">
										<option value='AC'>AC</option>
										<option value='AL'>AL</option>
										<option value='AP'>AP</option>
										<option value='AM'>AM</option>
										<option value='BA'>BA</option>
										<option value='CE'>CE</option>
										<option value='DF'>DF</option>
										<option value='ES'>ES</option>
										<option value='GO'>GO</option>
										<option value='MA'>MA</option>
										<option value='MG'>MG</option>
										<option value='MS'>MS</option>
										<option value='MT'>MT</option>
										<option value='PA'>PA</option>
										<option value='PB'>PB</option>
										<option value='PE'>PE</option>
										<option value='PI'>PI</option>
										<option value='PR'>PR</option>
										<option value='RJ'>RJ</option>
										<option value='RN'>RN</option>
										<option value='RO'>RO</option>
										<option value='RR'>RR</option>
										<option value='RS'>RS</option>
										<option value='SC'>SC</option>
										<option value='SE'>SE</option>
										<option value='SP'>SP</option>
										<option value='TO'>TO</option>
									</select>
								</p>
								<p>CEP<input type="text" name="endereco[cep]" value="<?php echo $info->cep; ?>"></p>
								<p>Bairro<input type="text" name="endereco[bairro]" value="<?php echo $info->bairro; ?>"></p>
								<p>Rua<input type="text" name="endereco[rua]" value="<?php echo $info->rua; ?>"></p>
								<p>Número<input type="text" name="endereco[numero]" value="<?php echo $info->numero; ?>"></p>
								<p>Complemento<input type="text" name="endereco[complemento]" value="<?php echo $info->complemento ?? ''; ?>"></p>
							</div>

							<div id="contato">
								<h2>Contato</h2>
								<p>E-mail<input type="E-mail" name="contato[email]" value="<?php echo $info->email; ?>"></p>
								<p>Celular<input type="text" name="contato[celular]" value="<?php echo $info->celular; ?>"></p>
								<p>Telefone<input type="text" name="contato[telefone]" value="<?php echo $info->telefone; ?>"></p>
							</div>
							<input class="btn btn-primary btn-lg" type="submit" value="Salvar" />
						</form>
					</div>

					<div role='tabpanel' class='tab-pane' id='conhecimentos'>
						<br>
						<a href='conhecimento.php'>
							<div class='btn btn-primary'><span>Novo conhecimento</span></div>
						</a>
						<br><br>
						<table class="table">
							<tr>
								<th colspan="3">Conhecimento</th>
								<th colspan="3">Proficiência</th>
							</tr>
							<tr>
								<td colspan="3">PHP</td>
								<td colspan="3">Avançado</td>
							</tr>
							<tr>
								<td colspan="3">Banco de Dados</td>
								<td colspan="3">Intermediário</td>
							</tr>
							<!--FOREACH CONHECIMENTO-->
						</table>
					</div>




					<div role="tabpanel" class="tab-pane" id="vagasDisp">
						</br>
						<center>
							<table class="table">
								<tr>
									<th>Vaga</th>
									<th>Empresa</th>
									<th>Remuneração</th>
									<th>Período</th>
								</tr>
								<?php

								foreach ($vagas as $vaga) {
									echo '<tr>';
									echo "<td>{$vaga->nome}</td>";
									echo "<td>{$vaga->nome_fantasia}</td>";
									echo "<td>{$vaga->remuneracao}</td>";
									echo "<td>{$vaga->periodo}</td>";
									echo "<td><a href='/estudante/vaga/{$vaga->vaga_id}'><div class='btn btn-primary'>Participar</div></a></td>";
									echo '</tr>';
								}
								?>
							</table>
						</center>
					</div>
				</div>

			</div>
		</div>
</body>

</html>