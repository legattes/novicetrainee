<?php

/*  Abrindo conexão com o Banco de Dados*/
	$host = "localhost";
	$usuario = "root";
	$senha = "";
	$banco = "novicetrainee";

		$con = mysqli_connect($host, $usuario, $senha, $banco);

		if (!$con) {
	   		echo "Error: Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
	   	 	echo "Debugging errno: " . mysql_connect_errno() . PHP_EOL;
	   	 	echo "Debugging error: " . mysql_connect_error() . PHP_EOL;
	    	exit;
		}
?>