<?php
require_once "../../php/dao/Dao.php";
?>
<!DOCTYPE html>
<html language="pt-br">

<head>
	<title>Novice Trainee</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width = device-width, initial-scale = 1">
	<meta name="keywords" content="Estágio, emprego, currículo, currículum, sites">
	<meta name="robots" content="index, follow">
	<link rel="stylesheet" href="../../css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
</head>

<body>
	<header>
		<nav>
			<ul>
				<li><a href="../../index.php"> Home </a></li>
				<li><a href="add.php"> Aluno </a></li>
				<li><a href="../empresa/add.php"> Empresa </a></li>
				<li><a href="../../index.php" #contato> Contato </a></li>
				<li><a href="../../index.php" #sobre> Sobre </a></li>
				<li><a href="../login.php"> Login </a></li>
			</ul>
		</nav>
	</header>

	<h1>Cadastro do Estudante</h1>

	<form id="formulario" method="POST" action="../../php/estudante/add.php">
		<div id="informacoesGerais">
			<h2>Informações Gerais</h2>
			<p>Nome Completo<input type="text" name="estudante[nome]"></p>
			<p>CPF<input type="text" name="estudante[cpf]"></p>
			<p>Senha de acesso<input type="password" name="estudante[senha]"></p>
			<p>Data de Nascimento<input type="Date" name="estudante[data_nasc]"></p>
			<p>Sexo<select name="estudante[sexo]">
					<option value="M">Masculino</option>
					<option value="F">Feminino</option>
				</select>
			</p>
			<p>Estado Civil<select name="estudante[estado_civil]">
					<option value="Solteiro">Solteiro</option>
					<option value="Casado">Casado</option>
					<option value="Divorciado">Divorciado</option>
					<option value="Viuvo">Viuvo</option>
				</select>
			</p>
		</div>

		<div id="Escolaridade">
			<h2> Escolaridade</h2>
			<p>Institução<select name="instituicao">
					<?php
					$instituicoes = (new Dao())->get('instituicao');
					foreach ($instituicoes as $instituicao) {
						echo "<option value='{$instituicao->instituicao_id}'>{$instituicao->nome}</option>";
					}
					?>
				</select>
			</p>
			<p>Curso<select name="curso">
				<option value='Ciência da Computação'>Ciência da Computação</option>
			</select></p>
			<p>RA<input type="text" name="RA"></p>
			<p>Semestre<input type="text" name="semestre"></p>
			<p>Periodo<select name="periodo">
					<option value='Diurno'>Diurno</option>
					<option value='Noturno'>Noturno</option>
				</select></p>
		</div>

		<div id="endereco">
			<h2>Endereço</h2>
			<p>Cidade<input type="text" name="endereco[cidade]"></p>
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
			<p>CEP<input type="text" name="endereco[cep]"></p>
			<p>Bairro<input type="text" name="endereco[bairro]"></p>
			<p>Rua<input type="text" name="endereco[rua]"></p>
			<p>Número<input type="text" name="endereco[numero]"></p>
			<p>Complemento<input type="text" name="endereco[complemento]"></p>
		</div>

		<div id="contato">
			<h2>Contato</h2>
			<p>E-mail<input type="E-mail" name="contato[email]"></p>
			<p>Celular<input type="text" name="contato[celular]"></p>
			<p>Telefone<input type="text" name="contato[telefone]"></p>
		</div>

		<input type="submit" name="cadastrar" value="Cadastrar">
		</div>
	</form>
	<footer>
		<h6>Desenvolvido por: Grupo - Faculdade Olavo Bilac</h6>
	</footer>
</body>

</html>