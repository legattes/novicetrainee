
<?php
//O tipo de caracteres a ser usado
    header('Content-Type: text/html; charset=utf-8');
//O tipo de caracteres a ser usado
    header('Content-Type: text/html; charset=utf-8');
/*----------------Informações gerais-----------*/echo "Informações GERAIS<br>";
	$nome        = $_POST["nome"];		echo $nome."<br>";
	$cpf         = $_POST["cpf"];		echo $cpf."<br>";
	$senha    = $_POST["senha"];		echo $senha."<br>";
	$dataNasc    = $_POST["data"];		echo $dataNasc."<br>";
	$sexo    = $_POST["sexo"];			echo $sexo."<br>";
	$estadoCivil = $_POST["estadoCivil"]; echo $estadoCivil."<br>";
/*------------------endereço---------------*/echo "ENDERECO<br>";
	$cidade = $_POST["cidade"];			echo $cidade."<br>";
	$estado = $_POST["estado"]; 		echo $estado."<br>";
	$bairro = $_POST["bairro"]; 		echo $bairro."<br>";
	$cep = $_POST["cep"]; 				echo $cep."<br>";
	$rua = $_POST["rua"]; 				echo $rua."<br>";
	$numero = $_POST["numero"];			echo $numero."<br>";
	$complemento = $_POST["complemento"];	echo $complemento."<br>";
/*-------------------contatoCERTO---------------*/echo "CONTATO<br>";
	$email     = $_POST["email"];		echo $email."<br>";
	$celular   = $_POST["celular"];		echo $celular."<br>";
	$telefone  = $_POST["telefone"];	echo $telefone."<br>";
	$telRecado = $_POST["recado"];		echo $telRecado."<br>";
/*-------------------escolaridade----------*/echo "ESCOLARIDADE<br>";
$ra = $_POST["RA"];
$graduacao    = $_POST["graduacao"];	echo $graduacao."<br>";
$instituicao  = $_POST["instituicao"];	echo $instituicao."<br>";
$estadoEsc    = $_POST["estadoEsc"];	echo $estadoEsc."<br>";
$cidadeEsc    = $_POST["cidadeEsc"];	echo $cidadeEsc."<br>";
$curso     = $_POST["curso"];			echo $curso."<br>";
$semestre     = $_POST["semestre"];		echo $semestre."<br>";
$periodo      = $_POST["periodo"];		echo $periodo."<br>";

/*-------------CONEXÃO -----------------------------*/
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "novicetrainee";

	$con = mysqli_connect($host, $usuario, $senha, $banco);

	if (!$con) 
	{
   		echo "Error: Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
   	 	echo "Debugging errno: " . mysql_connect_errno() . PHP_EOL;
   	 	echo "Debugging error: " . mysql_connect_error() . PHP_EOL;
    	exit;
	}
/*------------------------------------------CORRETO-------------------------------------------------*/
	$insertEscolaridade = mysqli_query($con,"INSERT INTO Escolaridade(RA, graduacao, fkInstituicao, fkEstado, cidade, curso, semestre, periodo)
			 VALUES('$ra','$graduacao', '$instituicao', '$estadoEsc', '$cidadeEsc', '$curso', '$semestre', '$periodo')");
			 
			$fkEscolaridade = mysqli_insert_id($con);
			echo $fkEscolaridade."<br>";
/*------------------------------------------CORRETO-------------------------------------------------*/	  						       
	$insertEndereco =  mysqli_query($con,"INSERT INTO Endereco(cidade, fkEstado, bairro, cep, rua, complemento, numero) 
					VALUES('$cidade', '$estado', '$bairro', '$cep', '$rua', '$complemento', '$numero')");
					
					$fkEndereco= mysqli_insert_id($con);
					
/*------------------------------------------CORRETO-------------------------------------------------*/
	$insertContato =  mysqli_query($con,"INSERT INTO Contato(email, celular, telefone, telRecado)
	  						VALUES('$email', '$celular', '$telefone', '$telRecado')"); 
	  				
	  				$fkContato = mysqli_insert_id($con);
	  			
/*-----------------------------------------CORRETO ---------------------------------------------------------*/	
	$insertGerais = "INSERT INTO Estudante(nome, cpf, senha, dataNasc, sexo, estadoCivil, fkEnderecoEst, fkContatoEst, fkEscolaridade)
	  			VALUES('$nome', '$cpf', '$senha', '$dataNasc', '$sexo', '$estadoCivil', '$fkEndereco', '$fkContato', '$fkEscolaridade)')"; 
	  			$resultado4 = mysqli_query($con, $insertGerais);
//-----------------FECHANDO CONEXAO---------------
	 mysqli_close($con); 
	 header("Location: ../html/login.html");
?>