<?php

/*  Abrindo conexão com o Banco de Dados*/
	$host = "localhost";
	$usuario = "root";
	$senha = "";
	$banco = "novicetrainee";

		$con = mysqli_connect($host, $usuario, $senha, $banco);

		if (!$con) {
	   		echo "Error: Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
	   	 	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	   	 	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	    	exit;
		}
	
?>
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
						<li><a href = "index.html">           Home    </a></li>
						<li><a href = "cadastroAluno.php">   Aluno	  </a></li>
						<li><a href = "cadastroEmpresa.php"> Empresa </a></li>
						<li><a href = "index.html"#contato>  Contato </a></li>
						<li><a href = "index.html"#sobre>	  Sobre   </a></li>
						<li><a href = "login.html">			  Login   </a></li>
					</ul>
				
				</nav>
		</header>

		<h1>Cadastro do Estudante</h1>

		<form id="formulario" method="POST" action="../php/cadEstudante.php">

			<div id="informacoesGerais">

				<h2>Informações Gerais</h2>
				<p>Nome Completo:		<input type="text" name="nome"> </p>
				<p>CPF:				    <input type="text" name="cpf">  </p>
				<p>Senha de acesso:     <input type="password" name="senha"></p>
				<p>Data de Nascimento:  <input type="Date" name="data"> </p>

				<p>Sexo:
					<select name="sexo">
						<option value= "m">Masculino</option>
						<option value= "f">Feminino</option>
					</select>
			    </p>

				<p>Estado Civil:
					<select name = "estadoCivil">
						<option value= "Solteiro">Solteiro</option>
						<option value= "Casado">Casado</option>
						<option value= "Divorciado">Divorciado</option>
						<option value= "Viuvo">Viuvo</option>
					</select>
			    </p>

			</div>

			<div id ="Escolaridade">

			 	<h2> Escolaridade</h>
			 	<p>RA: <input type="text" name="RA"></p>
			 	<p>Graduação: <input type = "text" name = "graduacao"> </p>
			 
			 	<p>Instituicao
				<select name = "instituicao">
					<?php 

						$instituicao = "SELECT * FROM Instituicao";
						$resultInstituicao = mysqli_query($con, $instituicao);

						while($dadosInstituicao = mysqli_fetch_array($resultInstituicao))
						{
							$nomeInstituicao = $dadosInstituicao['nomeInstituicao'];
							$idInstituicao   = $dadosInstituicao['idInstituicao'];
							echo"<option value='$idInstituicao'>$nomeInstituicao</option>";
						}	
					?>
				</select>
				</p>

				<p>Estado
				<select name = "estadoEsc">
					<?php 
						
						$estadoEsc = "SELECT * FROM Estados";
						$resultEstadoEsc = mysqli_query($con, $estadoEsc);

						while($dadosEsc = mysqli_fetch_assoc($resultEstadoEsc))
						{
							$nomeEstadoEsc = $dadosEsc['nomeEstado'];
							$idEstadoEsc = $dadosEsc['idEstado'];
							echo"<option value='$idEstadoEsc'>$nomeEstadoEsc</option>";
						}	
					?>
				</select>
				</p>

				<p>Cidade: <input type="text" name="cidadeEsc"></p>

				<p>Curso: <input type="text" name="curso"></p>

				<p>Semeste: <input type="text" name="semestre"></p>

				<p>Periodo: <input type="text" name="periodo"></p>
			</div>
			<div id="endereco">

				<h2>Endereço</h2>
				<p>Cidade:		<input type="text" name="cidade"> </p>
				<p>Estado
				<select name = "estado">
					<?php 
						
						$estado = "SELECT * FROM Estados";
						$resultEstado = mysqli_query($con, $estado);

						while($dados = mysqli_fetch_assoc($resultEstado))
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
				<p>Rua: 		<input type="text" name="rua"> </p>
				<p>Complemento: <input type="text" name="complemento"> </p>
				<p>numero: 		<input type="text" name="numero"> </p>

			</div>

			<div id="contato">

				<h2>Contato</h2>
				<p>E-mail:				<input type="E-mail" name="email"> </p>
				<p>celular:				<input type="text" name="celular"> </p>
				<p>telefone:			<input type="text" name="telefone">  </p>
				<p>telefone para recado:<input type="text" name="recado"> </p>

			</div>

				<input type="submit" name="cadastrar" value="Cadastrar">
				<input type="reset" name="Apagar campos" value="Redefinir">
				
			</div>



		</form>
		<footer>
				<h6>Desenvolvido por: Grupo - Faculdade Olavo Bilac</h6>
		</footer>
	</body>
</html>