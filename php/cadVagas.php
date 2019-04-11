<?php
	session_start();

	if(isset($_SESSION["cnpj"]))
	{
		$n1 = $_SESSION["cnpjEmp"];
		$n2 = $_SESSION["cnpj"];

		if($num1 != $num2)
		{
			echo"login não efetuado";
			exit;
		}
	}
	else
	{
		echo"Login não efetuado";
	}
//O tipo de caracteres a ser usado
    header('Content-Type: text/html; charset=utf-8');
/*----------------Cadastro de Vaga-----------*/
	$areaAtuacao       		 = $_POST["areaAtuacao"];	
	$periodo        	     = $_POST["periodo"];	
	$remuneracao    	     = $_POST["remuneracao"];	
	$atividadesDesenvolvidas = $_POST["atividadesDesenvolvidas"];	
	$beneficios              = $_POST["beneficios "];		
	$requisitos              = $_POST["requisitos"]; 
	$curso                   = $_POST["curso"];			
	$semestre                = $_POST["semestre"];
	$teste                   = $_POST["teste"]; 		
	
/*-------------CONEXÃO -----------------------------*/
$host    = "localhost";
$usuario = "root";
$senha   = "";
$banco   = "novicetrainee";

	$con = mysqli_connect($host, $usuario, $senha, $banco);

	if (!$con) 
	{
   		echo "Error: Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
   	 	echo "Debugging errno: " . mysql_connect_errno() . PHP_EOL;
   	 	echo "Debugging error: " . mysql_connect_error() . PHP_EOL;
    	exit;
	}

/*-----------------------------------------BUSCANDO ID EMPRESA-------------------------------------*/
	$selectEmpresa = msqli_query($con, "SELECT * FROM Empresa WHERE cnpj = $cnpj");
		$fkEmpresa = mysqli_insert_id($con);

/*------------------------------------------CORRETO-------------------------------------------------*/
	$insertVagas = mysqli_query($con,"INSERT INTO Vagas(curso, semestre, areaAtuacao, remuneracao, periodo, ativDesenvolvidas, requisitos, beneficios, fkEmpresa, teste) VALUES ('$curso', '$semestre', '$areaAtuacao', '$remuneracao', '$periodo', '$atividadesDesenvolvidas',
													'$requisitos', '$beneficios', '$fkEmpresa', '$teste')");
			 //retorna o ID
			$fkVagas = mysqli_insert_id($con);
			$_SESSION["idVaga"] = $idVaga;

//-----------------FECHANDO CONEXAO---------------
	 mysqli_close($con);
	 //REDIRECIONANDO APÓS O CADASTRO 
	 header("Location: ../html/login.html");
?>