<?php
require_once "../../php/dao/Empresa.php";
require_once "../../php/Session.php";

Session::handle('empresa');

$model = Session::get('model');
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
			</div>
			<div>

				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="pill">Home</a></li>
					<li role="presentation"><a href="#atDados" aria-controls="atDados" role="tab" data-toggle="pill">Atualizar Dados</a></li>
					<li role="presentation"><a href="#CadastrarVag" aria-controls="CadastrarVag" role="tab" data-toggle="pill">Cadastrar Vagas</a></li>
				</ul>


				<!-- Home -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="home">
						<center>
							<p>
								<h2><b>Nome Empresa</b></h2>
							</p>
						</center>
						</br></br>
						</br></br>
						<center>
							<table border="1" width="800">
								<tr>
									<td>Vaga</td>
									<td>Curso</td>
									<td>Semestre</td>
									<td>Area de atuação</td>
									<td>Periodo</td>
									<td>Remuneração</td>
								</tr>
								
								<?php								
								$vagas = (new Empresa())->getVagas(Session::get('empresa_id'));

								foreach($vagas as $vaga){
									echo '<tr>';
									echo '<td>' . $vaga->vaga_id . '</td>';									
									echo '<td>' . $vaga->curso . '</td>';									
									echo '<td>' . $vaga->semestre . '</td>';									
									echo '<td>' . $vaga->area_atuacao . '</td>';									
									echo '<td>' . $vaga->periodo . '</td>';									
									echo '<td>' . $vaga->remuneracao . '</td>';			
									echo '</tr>';								
								}
								?>

								
							</table>
						</center>
					</div>

					<!-- ATUALIZAR DADOS -->
					<div role="tabpanel" class="tab-pane" id="atDados">

						<form id="formulario" method="POST" action="">
							<table class="table">
								<tr>
									<td colspan="3">
										<h2>Endereço</h2>
									</td>
								</tr>
								<tr>
									<td>
										<p>Cidade:
									</td>
									<td><input type="text" name="cidade"> </p>
									</td>

								</tr>
								<tr>
									<td>
										<p>Estado
									</td>
									<td><select name="estado" size=1>
											<option value='AC'>AC</option>
											<option value='AL'> AL</option>
											<option value='AP'> AP</option>
											<option value='AM'> AM</option>
											<option value='BA'> BA</option>
											<option value='CE'> CE</option>
											<option value='DF'> DF</option>
											<option value='ES'> ES</option>
											<option value='GO'> GO</option>
											<option value='MA'> MA</option>
											<option value='MT'> MT</option>
											<option value='MS'> MS</option>
											<option value='MG'> MG</option>
											<option value='PA'> PA</option>
											<option value='PB'> PB</option>
											<option value='PE'> PE</option>
											<option value='PI'> PI</option>
											<option value='PR'> PR</option>
											<option value='RJ'> RJ</option>
											<option value='RN'> RN</option>
											<option value='RS'> RS</option>
											<option value='RO'> RO</option>
											<option value='RR'> RR</option>
											<option value='SC'> SC</option>
											<option value='SP'> SP</option>
											<option value='SE'> SE</option>
											<option value='TO'> TO</option>
										</select>
										</p>
									</td>
								</tr>

								<tr>
									<td>
										<p>Bairro:
									</td>
									<td><input type="text" name="bairro"> </p>
									</td>

								</tr>
								<tr>
									<td>
										<p>CEP:
									</td>
									<td><input type="text" name="cep"> </p>
									</td>

								</tr>
								<tr>
									<td>
										<p>Rua:
									</td>
									<td><input type="text" name="rua"> </p>
									</td>

								</tr>
								<tr>
									<td>
										<p>Complemento:
									</td>
									<td><input type="text" name="complemento"> </p>
									</td>

								</tr>
								<tr>
									<td>
										<p>Nº:
									</td>
									<td><input type="text" name="numero"> </p>
									</td>

								</tr>
								<tr>
									<td colspan="3">
										<h2>Contato</h2>
									</td>
								</tr>
								<tr>
									<td>
										<p>E-mail:
									</td>
									<td><input type="E-mail" name="email"> </p>
									</td>

								</tr>
								<tr>
									<td>
										<p>Celular:
									</td>
									<td><input type="text" name="celular"> </p>
									</td>

								</tr>
								<tr>
									<td>
										<p>Telefone:
									</td>
									<td><input type="text" name="telefone"> </p>
									</td>

								</tr>
							</table>
							<input class="btn btn-primary btn-lg" type="submit" value="Salvar" />
						</form>
					</div>


					<!-- CADASTRAR VAGAS -->

					<div role="tabpanel" class="tab-pane" id="CadastrarVag">
						<form id="formulario" method="POST" action="../php/cadastroEstudante.php">
							<table class="table">
								<thead>
									<tr>
										<th></th>
										<th></th>
										<th></th>
									</tr>
								</thead>
								<tr>
									<td colspan="3">
										<h2>Informações Gerais</h2>
									</td>
								</tr>
								<tr>
									<td>
										<p>Área de Atuação:
									</td>
									<td><input type="text" name="AreaAtuacao"> </p>
									</td>

								</tr>
								<tr>
									<td>
										<p>Remuneração:
									</td>
									<td><input type="text" name="Remuneração"> </p>
									</td>

								</tr>
								<tr>
									<td>
										<p>Atividades Desenvolvidas:
									</td>
									<td><input type="text" name="atividades"></p>
									</td>

								</tr>
								<tr>
									<td>
										<p>Benefícios
									</td>
									<td><input type="text" name="beneficios"> </p>
									</td>

								</tr>
								<tr>
									<td>
										<p>Periodo::
									</td>
									<td><select name="Periodo">
											<option value="manha">Manhã</option>
											<option value="tarde">Tarde</option>
											<option value="noite">Noite</option>
										</select>
										</p>
									</td>

								</tr>
								<tr>
									<td colspan="3">
										<h2> Escolaridade</h2>
									</td>
								</tr>

								<tr>
									<td>
										<p>Requisitos:
									</td>
									<td><input type="text" name="requisitos"></p>
									</td>

								</tr>
								<tr>
									<td>
										<p>Informaçoes adicionais:
									</td>
									<td><input type="text" name="AdicionalInfo"></p>
									</td>

								</tr>

								<tr>
									<td>
										<p>Curso:
									</td>
									<td><input type="text" name="curso"></p>
									</td>

								</tr>

								<tr>
									<td>
										<p>Semeste:
									</td>
									<td><input type="text" name="semestre"></p>
									</td>

								</tr>
								<tr>
									<td>
										<p>Periodo:
									</td>
									<td><input type="text" name="periodo"></p>
									</td>

								</tr>
								<tr>
									<td colspan="3">
										<h2> Enviar Teste </h2>
									</td>
								</tr>
								<tr>
									<td><input type="file" name="Teste"></td>
								</tr>
								<tr>
									<td><input class="btn btn-primary " type="submit" value="Salvar" /></td>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>

</html>