<?php
require_once "../../php/dao/Estudante.php";
require_once "../../php/Session.php";

Session::handle('estudante');

$model = Session::get('model');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Área do Estudante</title>
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container theme-showcase" role="main">
		<div class="container-fuid">
			<div class="page-header">
				<h1>Área do Estudante</h1>
				<a href='../../php/login.php'><div class='btn btn-primary'><span>Sair</span></div></a>
			</div>
			<div>

				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="pill">Home</a></li>
					<li role="presentation"><a href="#atDados" aria-controls="atDados" role="tab" data-toggle="pill">Atualizar Dados</a></li>
					<li role="presentation"><a href="#vagasDisp" aria-controls="vagasDisp" role="tab" data-toggle="pill">Vagas Disponíveis</a></li>
					<li role="presentation"><a href="#curriculo" aria-controls="curriculo" role="tab" data-toggle="pill">Currículo</a></li>
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
							<table border="1" width="600">
								<tr>
									<td colspan="4">
										<center>Vagas Inscritas</center>
									</td>
								</tr>
								<tr>
									<td>TESTE</td>
								</tr>
							</table>
						</center>
					</div>


					<!-- ATUALiZAR DADOS -->

					<div role="tabpanel" class="tab-pane" id="atDados">

						<form id="formulario" method="POST" action="../php/cadastroEstudante.php">
							<table class="table">
								<tr>
									<td colspan="3">
										<h2>Informações Gerais</h2>
									</td>
								</tr>

								<tr>
									<td>
										<p>Senha de acesso:
									</td>
									<td><input type="password" name="senha"></p>
									</td>

								</tr>
								<tr>
									<td>
										<p>Estado Civil:
									</td>
									<td><select name="estadoCivil">
											<option value="Solteiro">Solteiro</option>
											<option value="Casado">Casado</option>
											<option value="Divorciado">Divorciado</option>
											<option value="Viuvo">Viuvo</option>
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
										<p>RA:
									</td>
									<td><input type="text" name="RA"></p>
									</td>

								</tr>
								<tr>
									<td>
										<p>Graduação:
									</td>
									<td><input type="text" name="graduacao"></p>
									</td>

								</tr>
								<tr>
									<td>
										<p>Instituicao
									</td>
									<td><select name="instituicao">
											<?php

											?>
										</select>
										</p>
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
										<p>Cidade:
									</td>
									<td><input type="text" name="cidadeEsc"></p>
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
									<td><select name="estado">
											<?php

											$estado = "SELECT * FROM Estados";
											$resultEstado = mysqli_query($con, $estado);

											while ($dados = mysqli_fetch_assoc($resultEstado)) {
												$nomeEstado = $dados['nomeEstado'];
												$idEstado = $dados['idEstado'];
												echo "<option value='$idEstado'>$nomeEstado</option>";
											}
											?>
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
						</form>

						<input class="btn btn-primary btn-lg" type="submit" value="Salvar" />
					</div>
					<div role="tabpanel" class="tab-pane" id="vagasDisp">
						</br>
						<center>
							<table class="table" border="1">
								<tr>
									<td colspan="3">TESTE</td>
									<td align="right"><input class="btn btn-info" type="submit" value="Participar" /></td>
							</table>
						</center>
					</div>
					<div role="tabpanel" class="tab-pane" id="curriculo">
						</br>
						<p>CPF:<input type="text" name="cpf"></p>


						<input class="btn btn-info" type="submit" value="Gerar Currículo" />

					</div>
				</div>

			</div>
		</div>
</body>

</html>