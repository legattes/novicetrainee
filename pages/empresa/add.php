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

		<form id="formulario" method="POST" action="../php/cadEmpresa.php">

			<div id="informacoesGerais">

				<h2>Informações Gerais</h2>
				<p>Nome da Empresa:	<input type="text" name="nome"> </p>
				<p>CNPJ:			<input type="text" name="cnpj">  </p>
				<p>Senha de acesso: <input type="password" name="senha"></p>

			</div>

			<div id="endereco">

				<h2>Endereço</h2>
				<p>Cidade:		<input type="text" name="cidade"> </p>
				<p>Estado
				<select name = "estado">
					<?php 

						$estado = "SELECT * FROM estados";
						$resultEstado = mysqli_query($con, $estado);

						while($dados = mysqli_fetch_array($resultEstado))
						{
							$nomeEstado = $dados['nomeEstado'];
							$idEstado = $dados['idEstado'];
							echo"<option value='$idEstado'>$nomeEstado</option>";
						}	
					?>
				</select>
				</p>
				<p>Bairro: 		<input type="text" name="bairro"> </p>
				<p>CEP:		    <input type="text" name="cep"> </p>
				<p>Rua:  <input type="text" name="rua"> </p>
				<p>Complemento:  <input type="text" name="complemento"> </p>
				<p>numero: 		<input type="text" name="numero"> </p>

			</div>

			<div id="contato">

				<h2>Contato</h2>
				<p>E-mail:				<input type="text" name="email"> </p>
				<p>celular:				<input type="text" name="celular"> </p>
				<p>telefone:			<input type="text" name="telefone">  </p>
				<p>telefone para recado:<input type="text" name="recado"> </p>

			</div>

			<div id="objetivo">

				<p>Tipo de vaga:
				<select name="tipoVaga">
					<option value="estagio">Estágio</option>
					<option value="aprendiz">Aprendiz</option>
				</select>
				</p>

			</div>

			<div id="buttom">

				<input type="submit" name="cadastrar" value="Cadastrar">
				<input type="reset" name="Apagar campos">
				
			</div>
		</form>
		<footer>
				<h6>Desenvolvido por: Grupo - Faculdade Olavo Bilac</h6>
		</footer>
	</body>
</html>