<!DOCTYPE html>
<html language="pt-br">

<head>
	<title>Novice Trainee</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width = device-width, initial-scale = 1">
	<meta name="keywords" content="Estágio, emprego, currículo, currículum, sites">
	<meta name="robots" content="index, follow">
	<link rel="stylesheet" href="../css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
</head>

<body>
	<header>
		<nav>

			<ul>
				<li><a href="../index.php"> Home </a></li>
				<li><a href="estudante/add.php"> Aluno </a></li>
				<li><a href="empresa/add.php"> Empresa </a></li>
				<li><a href="../index.php#contato"> Contato </a></li>
				<li><a href="../index.php#sobre"> Sobre </a></li>
				<li><a href="login.php"> Login </a></li>
			</ul>

		</nav>
	</header>
	<form name="login_empresa" method="POST" action="../php/login.php">
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

	<form name="login_aluno" method="POST" action="../php/login.php">
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