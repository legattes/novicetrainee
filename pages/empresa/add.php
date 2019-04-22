<?php


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
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
</head>

<body>
	<header>
		<nav>
			<ul>
				<li><a href="../../index.php"> Home </a></li>
				<li><a href="../estudante/add.php"> Aluno </a></li>
				<li><a href="add.php"> Empresa </a></li>
				<li><a href="../../index.php" #contato> Contato </a></li>
				<li><a href="../../index.php" #sobre> Sobre </a></li>
				<li><a href="../login.php"> Login </a></li>
			</ul>
		</nav>
	</header>

	<h1>Cadastro da Empresa</h1>

	<form id="formulario" method="POST" action="../../php/empresa/add.php">
		<div id="informacoesGerais">
			<h2>Informações Gerais</h2>
			<p>CNPJ<input type="text" name="empresa[cnpj]"> </p>
			<p>Nome Fantasia<input type="text" name="empresa[nome_fantasia]"> </p>
			<p>Razão Social<input type="text" name="empresa[razao_social]"> </p>
			<p>Senha de acesso: <input type="password" name="empresa[senha]"></p>
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

		<div id="buttom">
			<input type="submit" name="cadastrar" value="Cadastrar">
		</div>
	</form>
	<footer>
		<h6>Desenvolvido por: Grupo - Faculdade Olavo Bilac</h6>
	</footer>
</body>

</html>