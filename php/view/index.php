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
	<script src='/js/bootstrap.min.js'></script>
	<link rel="stylesheet" href="/css/styles.css">
	<link rel='stylesheet' href='/css/bootstrap.min.css'>
</head>

<body>
	<?php include('componentes/menu.php'); ?>
	<div class='container-fluid'>
		<form name="login_empresa" method="POST" action="empresa/login">
			<div id="loginEmpresa">
				<h1>Login Empresa</h1>
				<div class='login-input'>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">CNPJ</span>
						<input type="text" class="form-control" name="cnpj" placeholder="CNPJ" aria-describedby="basic-addon1">
					</div>

					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Senha</span>
						<input type="password" class="form-control" name="senha" placeholder="Senha" aria-describedby="basic-addon1">
					</div>
				</div>

				<div id="button">
					<input type="submit" class='btn btn-primary' name="loginEmpresa" value="Login">
				</div>
			</div>
		</form>
		<br>

		<form name="login_aluno" method="POST" action="estudante/login">
			<div id="loginAluno">
				<h1>Login Aluno</h1>

				<div class='login-input'>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">CPF</span>
						<input type="text" class="form-control" name="cpf" placeholder="CPF" aria-describedby="basic-addon1">
					</div>

					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Senha</span>
						<input type="password" class="form-control" name="senha" placeholder="Senha" aria-describedby="basic-addon1">
					</div>
				</div>
			</div>

			<div id="button">
				<input type="submit" class='btn btn-primary' name="loginAluno" value="Login">
			</div>
		</form>
	</div>
	<footer>
		<span>Desenvolvido por: legates</span>
	</footer>
</body>

</html>