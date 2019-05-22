<?php
require_once "../php/controller/Empresa.php";
require_once "../php/Session.php";
require_once "../php/dao/Dao.php";

$cursos = (new Dao())->get('curso');


Session::handle('empresa');

$model = Session::get('model');

$info = (new Empresa())->info($model->empresa_id)[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Área da Empresa</title>
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/styles.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
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
								<h2><?php echo $model->nome_fantasia; ?></h2>
							</p>
						</center>
						</br></br>
						</br></br>
						<center>
							<table class='table'>
								<tr>
									<td>Vaga</td>
									<td>Curso</td>
									<td>Semestre</td>
									<td>Periodo</td>
									<td>Remuneração</td>
								</tr>

								<?php
								$vagas = (new Empresa())->vagas($model->empresa_id);

								foreach ($vagas as $vaga) {
									echo '<tr>';
									echo '<td>' . $vaga->nome . '</td>';
									echo '<td>' . $vaga->curso_nome . '</td>';
									echo '<td>' . $vaga->semestre . '</td>';
									echo '<td>' . $vaga->periodo . '</td>';
									echo '<td>' . $vaga->remuneracao . '</td>';
									echo "<td><a href='/empresa/vaga/{$vaga->vaga_id}'><div class='btn btn-primary'>Participantes</div></a></td>";
									echo "<td><a href='/empresa/prova/{$vaga->vaga_id}'<div class='btn btn-primary'>Prova</div></td>";
									echo '</tr>';
								}
								?>

							</table>
						</center>
					</div>

					<!-- ATUALIZAR DADOS -->
					<div role="tabpanel" class="tab-pane" id="atDados">
						<form id="formulario" method="POST" action="empresa/edit">
							<div id="endereco">
								<h2>Endereço</h2>
								<div class='row'>
									<div class='col-md-2 left'><label>Cidade</label></div>
									<div class='col-md-6 left'><input type="text" name="endereco[cidade]" value="<?php echo $info->cidade; ?>"></div>
								</div>
								<div class='row'>
									<div class='col-md-2 left'><label>Estado
										</label></div>
									<div class='col-md-6 left'><select name="endereco[estado]">
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
										</select></div>
								</div>
								<div class='row'>
									<div class='col-md-2 left'><label>CEP</label></div>
									<div class='col-md-6 left'><input type="text" name="endereco[cep]" value="<?php echo $info->cep; ?>"></div>
								</div>
								<div class='row'>
									<div class='col-md-2 left'><label>Bairro</label></div>
									<div class='col-md-6 left'><input type="text" name="endereco[bairro]" value="<?php echo $info->bairro; ?>"></div>
								</div>
								<div class='row'>
									<div class='col-md-2 left'><label>Rua</label></div>
									<div class='col-md-6 left'><input type="text" name="endereco[rua]" value="<?php echo $info->rua; ?>"></div>
								</div>
								<div class='row'>
									<div class='col-md-2 left'><label>Número</label></div>
									<div class='col-md-6 left'><input type="text" name="endereco[numero]" value="<?php echo $info->numero; ?>"></div>
								</div>
								<div class='row'>
									<div class='col-md-2 left'><label>Complemento</label></div>
									<div class='col-md-6 left'><input type="text" name="endereco[complemento]" value="<?php echo $info->complemento; ?>"></div>
								</div>
							</div>

							<div id="contato">
								<h2>Contato</h2>
								<div class='row'>
									<div class='col-md-2 left'><label>E-mail</label></div>
									<div class='col-md-6 left'><input type="E-mail" name="contato[email]" value="<?php echo $info->email; ?>"></div>
								</div>
								<div class='row'>
									<div class='col-md-2 left'><label>Celular</label></div>
									<div class='col-md-6 left'><input type="text" name="contato[celular]" value="<?php echo $info->celular; ?>"></div>
								</div>
								<div class='row'>
									<div class='col-md-2 left'><label>Telefone</label></div>
									<div class='col-md-6 left'><input type="text" name="contato[telefone]" value="<?php echo $info->telefone; ?>"></div>
								</div>
							</div>
							</label>
					</div>
					<div class='col-md-6 left'><input class="btn btn-primary btn-lg" type="submit" value="Salvar" />
						</form>
					</div>

					<!-- CADASTRAR VAGAS -->

					<div role="tabpanel" class="tab-pane" id="CadastrarVag">
						<form id="formulario" method="POST" action="empresa/vaga">
							<table class="table">
								<tr>
									<td colspan="3">
										<h2>Informações</h2>
									</td>
								</tr>
								<tr>
									<td>
										<div class='row'>
											<div class='col-md-2 left'><label>Nome
									</td>
									<td></label>
					</div>
					<div class='col-md-6 left'><input type="text" name="vaga[nome]"></div>
				</div>
				</td>
				</tr>
				<tr>
					<td>
						<div class='row'>
							<div class='col-md-2 left'><label>Período
					</td>
					<td>
						<select name="vaga[periodo]">
							<option value='Manha'>Manhã</option>
							<option value='Tarde'>Tarde</option>
							<option value='Noite'>Noite</option>
						</select>
			</div>
		</div>
		</td>
		</tr>
		<tr>
			<td>
				<div class='row'>
					<div class='col-md-2 left'><label>Remuneração
			</td>
			<td></label>
	</div>
	<div class='col-md-6 left'><input type="text" name="vaga[remuneracao]"></div>
	</div>
	</td>
	</tr>
	<tr>
		<td>
			<div class='row'>
				<div class='col-md-2 left'><label>Curso
		</td>
		<td><select name="vaga[curso]">
				<?php foreach ($cursos as $curso) {
					echo "<option value='{$curso->curso_id}'>{$curso->nome}</option>";
				} ?>
			</select></div>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<div class='row'>
				<div class='col-md-2 left'><label>Semestre
		</td>
		<td></label></div>
			<div class='col-md-6 left'><input type="text" name="vaga[semestre]"></div>
			</div>
		</td>
	</tr>
	<tr>
		<td></label></div>
			<div class='col-md-6 left'><input class="btn btn-primary " type="submit" value="Salvar" />
		</td>s
	</tr>
	</form>
	</div>
	</div>s
	</div>
	</div>
	</div>
	</div>
</body>

</html>