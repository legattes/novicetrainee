<?php

require_once "..\php\controller\Estudante.php";
?>

<!DOCTYPE html>
<html language="pt-br">

<head>
	<title>Novice Trainee</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width = device-width, initial-scale = 1">
	<meta name="description" content="Novice Trainee.">
	<meta name="keywords" content="Estágio, emprego, currículo, currículum, sites">
	<meta name="robots" content="index, follow">
	<link rel="stylesheet" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
</head>

<body>
	<img src="https://i.ibb.co/Dw32DGF/Capturar.png" alt="Capturar" border="0"></a>

	<?php include('componentes/menu.php');?>

	<form name="login_empresa" method="POST" action="empresa/login">
		<div id="loginEmpresa">
			<h1>Login Empresa</h1>

			<p>CNPJ: <input type="text" name="cnpj"> </p>
			<p>Senha: <input type="password" name="senha"> </p>

			<div id="buttom">
				<input type="submit" name="loginEmpresa" value="Login">
			</div>
		</div>
	</form>
	<br>

	<form name="login_aluno" method="POST" action="estudante/login">
		<div id="loginAluno">
			<h1>Login Aluno</h1>

			<p>CPF: <input type="text" name="cpf"> </p>
			<p>Senha: <input type="password" name="senha"> </p>
		</div>

		<div id="buttom">
			<input type="submit" name="loginAluno" value="Login">
		</div>
	</form>
	<footer>
		<h6>Desenvolvido por: Grupo - Faculdade Olavo Bilac</h6>
	</footer>
</body>

</html>