<?php

class Connection

{
	public function connect()
	{
		$host = "sql175.main-hosting.eu";
		$usuario = "u112785488_novic";
		$senha = "3Uj7zy98@";
		$banco = "u112785488_novic";

		$con = mysqli_connect($host, $usuario, $senha, $banco);

		if (!$con) {
			echo "Error: Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
			echo "Debugging errno: " . mysql_connect_errno() . PHP_EOL;
			echo "Debugging error: " . mysql_connect_error() . PHP_EOL;
			exit;
		}

		return $con;
	}
}
