<?php

/*  Abrindo conexão com o Banco de Dados*/
	$host = "localhost";
	$usuario = "root";
	$senha = "";
	$banco = "novicetrainee"; /*<-----Alterar BD*/

		$con = mysqli_connect($host, $usuario, $senha, $banco);

		if (!$con) {
	   		echo "Error: Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
	   	 	echo "Debugging errno: " . mysql_connect_errno() . PHP_EOL;
	   	 	echo "Debugging error: " . mysql_connect_error() . PHP_EOL;
	    	exit;
		}
/*--------------abrindo arquivo-----------*/
	$fileEstados = fopen("estados.txt","r");

	while(!feof($fileEstados))
	{

		$estado = fgets($fileEstados);

		$sql1 = "INSERT INTO Estados(nomeEstado) values ('$estado')"; 
		$resultado1 = mysqli_query($con, $sql1);
	}
	
/*--------------abrindo arquivo-----------*/
$fileInstituicoes = fopen("instituicoes.txt","r");

	while(!feof($fileInstituicoes))
	{

		$instituicao = fgets($fileInstituicoes);

		$sql2 = "INSERT INTO Instituicao(nomeInstituicao) values ('$instituicao')";
		$resultado2 = mysqli_query($con, $sql2);   
		ini_set('max_execution_time', 300); //300 seconds = 5 minutes
	}
	echo"Sucesso!";
?>