
<?php

/*----------------Informações gerais-----------*/
	$nome        = $_POST["nome"];
	$cpf         = $_POST["cpf"];
	$senha    	 = $_POST["senha"];
	$dataNasc    = $_POST["data"];
	$sexo    	 = $_POST["sexo"];
	$estadoCivil = $_POST["estadoCivil"];
/*------------------endereço---------------*/
	$cidade 	 = $_POST["cidade"];
	$estado 	 = $_POST["estado"]; 
	$bairro 	 = $_POST["bairro"]; 
	$cep 		 = $_POST["cep"]; 
	$rua 		 = $_POST["rua"]; 
	$numero		 = $_POST["numero"];
	$complemento = $_POST["complemento"];
/*-------------------contato---------------*/
	$email     = $_POST["email"];
	$celular   = $_POST["celular"];
	$telefone  = $_POST["telefone"];
	$telRecado = $_POST["recado"];
/*-------------------escolaridade----------*/
$graduacao    = $_POST["graduacao"];	
$instituicao  = $_POST["istituicao"];
$estadoEsc    = $_POST["estadoEsc"];
$cidadeEsc    = $_POST["cidadeEsc"];
$curso     	  = $_POST["curso"];
$semestre     = $_POST["semestre"];
$periodo      = $_POST["periodo"];
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
/*---------------Função SQL para retornar o ID do endereço selecionado----------*/
	$idEstado = "SELECT idEstado FROM Estados WHERE nomeEstado = $estado";
	$idEndereco = "SELECT idEndereco FROM Endereco WHERE fkEstado = $idEstado";

/*---------------Função SQL para retornar o ID do contato selecionado----------*/
	$idContato = "SELECT idContato FROM Contato WHERE email = $email";

/*---------------Função SQL para retornar o ID da Escolaridade de acordo com a instituicao selecionada ---*/

	$idInstituicao = "SELECT idInstituicao FROM Instituicao WHERE nomeInstituicao = $instituicao";
	$idEscolaridade = "SELECT idEscolaridade FROM Escolaridade WHERE fkInstituicao = $idInstituicao";

/*---------------------------INSERIDO OS DADOS DO FORMUULÁRIO NO BD---------------------------------*/
/*------------------------------------------CORRETO - ESCOLARIDADE-------------------------------------------------*/
	$insertEscolaridade = "INSERT INTO Escolaridade(graduacao, instituicao, estado, cidade, curso, semestre, periodo)
			 VALUES('$graduacao', '$idInstituicao', '$estadoEsc', '$cidadeEsc', '$curso', '$semestre', '$periodo')";
/*------------------------------------------CORRETO - ENDERECO------------------------------------------------*/	  						       
	$insertEndereco = "INSERT INTO Endereco(cidade, estado, bairro, cep, rua, complemento, numero) 
					VALUES('$cidade', '$idEstado', '$bairro', '$cep', '$rua', '$complemento', '$numero')";
/*------------------------------------------CORRETO - CONTATO-------------------------------------------------*/
	$insertContato = "INSERT INTO Contato(email, celular, telefone, telRecado)
	  						VALUES('$email', '$celular', '$telefone', '$telRecado')"; 
/*-----------------------------------------ESTUDANTE ERRO-usar a fução   sc_exec_sql ---------------------------------------------------------*/	
	$insertGerais = "INSERT INTO Estudante(nome, cpf, senha, dataNasc, sexo, estadoCivil, fkEndereco, fkContato, fkEscolaridade)
	  						VALUES('$nome', '$cpf', '$senha', '$dataNasc', '$sexo', '$estadoCivil', '$idEndereco','$idContato','$idEscolaridade')"; 

	/*Realizando consulta*/

	$resultado1 = mysqli_query($con, $insertEscolaridade);

	if(mysqli_affected_rows() == 1)
	{ //verifica se foi afetada alguma linha, nesse caso inserida alguma linha
        echo "<p>Cadastro feito com sucesso</p>";
        echo '<a href="areaAluno.html"></a>'; //Apenas um link para retornar para o formulário de cadastro
    } 
    else 
    {
        echo "Erro, não possível inserir no banco de dados";
    }

    $resultado2 = mysqli_query($con, $insertEndereco);

	if(mysqli_affected_rows() == 1)
	{ //verifica se foi afetada alguma linha, nesse caso inserida alguma linha
        echo "<p>Cadastro feito com sucesso</p>";
        echo '<a href="areaAluno.html"></a>'; //Apenas um link para retornar para o formulário de cadastro
    } 
    else 
    {
        echo "Erro, não possível inserir no banco de dados";
    }

    $resultado3 = mysqli_query($con, $insertContato);

	if(mysqli_affected_rows() == 1)
	{ //verifica se foi afetada alguma linha, nesse caso inserida alguma linha
        echo "<p>Cadastro feito com sucesso</p>";
        echo '<a href="cadastroEmpresa.html">Voltar para formulário de cadastro</a>'; //Apenas um link para retornar para o formulário de cadastro
    } 
    else 
    {
        echo "Erro, não possível inserir no banco de dados";
    }

	 mysqli_close($con); 

	$resultado4 = mysqli_query($con, $insertGerais);

	if(mysqli_affected_rows() == 1)
	{ //verifica se foi afetada alguma linha, nesse caso inserida alguma linha
        echo "<p>Cadastro feito com sucesso</p>";
        echo '<a href="cadastroEmpresa.html">Voltar para formulário de cadastro</a>'; //Apenas um link para retornar para o formulário de cadastro
    } 
    else 
    {
        echo "Erro, não possível inserir no banco de dados";
    }

	 mysqli_close($con); 
?>