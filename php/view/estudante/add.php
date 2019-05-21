<?php
require_once "../php/dao/Dao.php";
?>
<!DOCTYPE html>
<html language="pt-br">

<head>
	<title>Novice Trainee</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width = device-width, initial-scale = 1">
	<meta name="keywords" content="Estágio, emprego, currículo, currículum, sites">
	<meta name="robots" content="index, follow">
	<link rel="stylesheet" href="/css/styles.css">
	<link rel='stylesheet' href='/css/bootstrap.min.css'>
</head>

<body>
<?php include('../php/view/componentes/menu.php');?>
	<div class='container-fluid'>	

	<h1>Cadastro do Estudante</h1>

	<form id="formulario" method="POST" action="/estudante/add">
		<div id="informacoesGerais">
			<h2>Informações Gerais</h2>
			<div class='row'><div class='col-md-2 col-md-offset-2 left'><label>Nome Completo</label></div><div class='col-md-6 left'><input type="text" name="estudante[nome]"></div></div>
			<div class='row'><div class='col-md-2 col-md-offset-2 left'><label>CPF</label></div><div class='col-md-6 left'><input type="text" name="estudante[cpf]"></div></div>
			<div class='row'><div class='col-md-2 col-md-offset-2 left'><label>Senha de acesso</label></div><div class='col-md-6 left'><input type="password" name="estudante[senha]"></div></div>
			<div class='row'><div class='col-md-2 col-md-offset-2 left'><label>Data de Nascimento</label></div><div class='col-md-6 left'><input type="Date" name="estudante[data_nasc]"></div></div>
			<div class='row'><div class='col-md-2 col-md-offset-2 left'><label>Sexo</label></div><div class='col-md-6 left'><select name="estudante[sexo]">
					<option value="M">Masculino</option>
					<option value="F">Feminino</option>
				</select></div></div>
			
			<div class='row'><div class='col-md-2 col-md-offset-2 left'><label>Estado Civil</label></div><div class='col-md-6 left'><select name="estudante[estado_civil]">
					<option value="Solteiro">Solteiro</option>
					<option value="Casado">Casado</option>
					<option value="Divorciado">Divorciado</option>
					<option value="Viuvo">Viuvo</option>
				</select></div></div>
			
		</div>
		

		<div id="Escolaridade">
			<h2> Escolaridade</h2>
			<div class='row'><div class='col-md-2 col-md-offset-2 left'><label>Institução</label></div><div class='col-md-6 left'><select name="instituicao">
					<?php
					$instituicoes = (new Dao())->get('instituicao');
					foreach ($instituicoes as $instituicao) {
						echo "<option value='{$instituicao->instituicao_id}'>{$instituicao->nome}</option>";
					}
					?>
				</select></div>
			</div>
			
			<div class='row'><div class='col-md-2 col-md-offset-2 left'><label>Curso</label></div><div class='col-md-6 left'><select name="curso">
					<?php
					$cursos = (new Dao())->get('curso');
					foreach ($cursos as $curso) {
						echo "<option value='{$curso->curso_id}'>{$curso->nome}</option>";
					}
					?>
				</select></div></div>
			<div class='row'><div class='col-md-2 col-md-offset-2 left'><label>RA</label></div><div class='col-md-6 left'><input type="text" name="RA"></div></div>
			<div class='row'><div class='col-md-2 col-md-offset-2 left'><label>Semestre</label></div><div class='col-md-6 left'><input type="text" name="semestre"></div></div>
			<div class='row'><div class='col-md-2 col-md-offset-2 left'><label>Periodo</label></div><div class='col-md-6 left'><select name="periodo">
					<option value='Manha'>Manhã</option>
					<option value='Tarde'>Tarde</option>
					<option value='Noite'>Noite</option>
				</select></div></div>
		</div>

		<div id="endereco">
			<h2>Endereço</h2>
			<div class='row'><div class='col-md-2 col-md-offset-2 left'><label>Cidade</label></div><div class='col-md-6 left'><input type="text" name="endereco[cidade]"></div></div>
			<div class='row'><div class='col-md-2 col-md-offset-2 left'><label>Estado
				</label></div><div class='col-md-6 left'><select name="endereco[estado]">
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
				</select></div></div>
			
			<div class='row'><div class='col-md-2 col-md-offset-2 left'><label>CEP</label></div><div class='col-md-6 left'><input type="text" name="endereco[cep]"></div></div>
			<div class='row'><div class='col-md-2 col-md-offset-2 left'><label>Bairro</label></div><div class='col-md-6 left'><input type="text" name="endereco[bairro]"></div></div>
			<div class='row'><div class='col-md-2 col-md-offset-2 left'><label>Rua</label></div><div class='col-md-6 left'><input type="text" name="endereco[rua]"></div></div>
			<div class='row'><div class='col-md-2 col-md-offset-2 left'><label>Número</label></div><div class='col-md-6 left'><input type="text" name="endereco[numero]"></div></div>
			<div class='row'><div class='col-md-2 col-md-offset-2 left'><label>Complemento</label></div><div class='col-md-6 left'><input type="text" name="endereco[complemento]"></div></div>
		</div>

		<div id="contato">
			<h2>Contato</h2>
			<div class='row'><div class='col-md-2 col-md-offset-2 left'><label>E-mail</label></div><div class='col-md-6 left'><input type="E-mail" name="contato[email]"></div></div>
			<div class='row'><div class='col-md-2 col-md-offset-2 left'><label>Celular</label></div><div class='col-md-6 left'><input type="text" name="contato[celular]"></div></div>
			<div class='row'><div class='col-md-2 col-md-offset-2 left'><label>Telefone</label></div><div class='col-md-6 left'><input type="text" name="contato[telefone]"></div></div>
		</div>
		<div class='col-md-6 left'></label></div><div class='col-md-6 left'><input type="submit" class='btn btn-primary' name="cadastrar" value="Cadastrar"></div></div>
		</div>
	</form>
	<footer>
		<h6>Desenvolvido por: Grupo - Faculdade Olavo Bilac</h6>
	</footer>
</body>

</html>