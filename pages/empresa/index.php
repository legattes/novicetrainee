<?php
require_once "../../php/dao/Empresa.php";
require_once "../../php/Session.php";
require_once "../../php/dao/Dao.php";

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
									echo "<td><a href='vaga.php?id={$vaga->curso_id}'<div class='btn btn-primary'>Participantes</div></td>";
									echo '</tr>';
								}
								?>


							</table>
						</center>
					</div>

					<!-- ATUALIZAR DADOS -->
					<div role="tabpanel" class="tab-pane" id="atDados">
						<form id="formulario" method="POST" action="../../php/empresa/update.php">
							<div id="endereco">
								<h2>Endereço</h2>
								<p>Cidade<input type="text" name="endereco[cidade]" value="<?php echo $info->cidade;?>"></p>
								<p>Estado
									<select name="endereco[estado]">
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
								<p>CEP<input type="text" name="endereco[cep]" value="<?php echo $info->cep;?>"></p>
								<p>Bairro<input type="text" name="endereco[bairro]" value="<?php echo $info->bairro;?>"></p>
								<p>Rua<input type="text" name="endereco[rua]" value="<?php echo $info->rua;?>"></p>
								<p>Número<input type="text" name="endereco[numero]" value="<?php echo $info->numero;?>"></p>
								<p>Complemento<input type="text" name="endereco[complemento]" value="<?php echo $info->complemento;?>"></p>
							</div>

							<div id="contato">
								<h2>Contato</h2>
								<p>E-mail<input type="E-mail" name="contato[email]" value="<?php echo $info->email;?>"></p>
								<p>Celular<input type="text" name="contato[celular]" value="<?php echo $info->celular;?>"></p>
								<p>Telefone<input type="text" name="contato[telefone]" value="<?php echo $info->telefone;?>"></p>
							</div>
							<input class="btn btn-primary btn-lg" type="submit" value="Salvar" />
						</form>
					</div>


					<!-- CADASTRAR VAGAS -->

					<div role="tabpanel" class="tab-pane" id="CadastrarVag">
						<form id="formulario" method="POST" action="../../php/vaga/add.php">
							<table class="table">
								<tr>
									<td colspan="3">
										<h2>Informações</h2>
									</td>
								</tr>						

								<tr>
									<td>
										<p>Nome
									</td>
									<td><input type="text" name="vaga[nome]"></p>
									</td>
								</tr>
								<tr>
									<td>
										<p>Período
									</td>
									<td><select name="vaga[periodo]">
											<option value='Manha'>Manhã</option>
											<option value='Tarde'>Tarde</option>
											<option value='Noite'>Noite</option>
										</select>
										</p>
									</td>
								</tr>
								<tr>
									<td>
										<p>Remuneração
									</td>
									<td><input type="text" name="vaga[remuneracao]"></p>
									</td>
								</tr>
								<tr>
									<td>
										<p>Curso
									</td>
									<td><select name="vaga[curso]">
										<?php foreach ($cursos as $curso){
											echo "<option value='{$curso->curso_id}'>{$curso->nome}</option>";
											}?>
									</select></p>
									</td>

								</tr>

								<tr>
									<td>
										<p>Semestre
									</td>
									<td><input type="text" name="vaga[semestre]"></p>
									</td>

								</tr>
								
								<tr>
									<td><input class="btn btn-primary " type="submit" value="Salvar" /></td>
								</tr>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>

</html>