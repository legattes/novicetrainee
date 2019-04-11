
<?php
//O tipo de caracteres a ser usado
    header('Content-Type: text/html; charset=utf-8');
    
//Essas variáveis recebem o que está sendo passado no  formulario de cadastro Empresa|
/*----------------Informações gerais-----------*/
	$nome = $_POST["nome"];		
	$tipoVaga = $_POST["tipoVaga"];		 
	$cnpj = $_POST["cnpj"];		 
	$senha = $_POST["senha"];	
/*------------------endereço---------------*/ 
	$cidade = $_POST["cidade"];			 
	$estado = $_POST["estado"]; 		 
	$bairro = $_POST["bairro"]; 		 
	$cep = $_POST["cep"]; 			
	$rua = $_POST["rua"]; 				 
	$numero = $_POST["numero"];			
	$complemento = $_POST["complemento"];	 
/*-------------------contatoCERTO---------------*/ 
	$email = $_POST["email"];		
	$celular = $_POST["celular"];		 
	$telefone = $_POST["telefone"];	 
	$telRecado = $_POST["recado"];		 
/*-------------CONEXÃO -----------------------------*/
// Já essas que estão aqui embaixofazem a conexão com o banco		
$host = "localhost";
$usuario = "root";
$senhaBd = "";   //OBSERVAÇÃO;;;; <- essa variável está com o nome igual a...
$banco = "novicetrainee";
	//Comando sql para fazer conexao com o banco de dados
	$con = mysqli_connect($host, $usuario, $senhaBd, $banco);
	//Se a conexão der erro, exiba que deu erro
	if (!$con) 
	{
   		echo "Error: Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
   	 	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
   	 	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    	exit;
	}
/*------------------------------------------ERRO-------------------------------------------------*/	
	$insertEndereco = mysqli_query($con, "INSERT INTO Endereco(cidade, fkEstado, bairro, cep, rua, complemento, numero) 
					VALUES('$cidade', '$estado', '$bairro', '$cep', '$rua', '$complemento', '$numero')");
					$fkEndereco = mysqli_insert_id($con);
/*------------------------------------------CORRETO-------------------------------------------------*/
	
	$insertContato = mysqli_query($con, "INSERT INTO Contato(email, celular, telefone, telRecado)			
	  						VALUES('$email', '$celular', '$telefone', '$telRecado')"); 
							
				$fkContato = mysqli_insert_id($con);
/*------------------------------------------ERRO-------------------------------------------------*/

	$insertGerais = mysqli_query ($con, "INSERT INTO Empresa(nome, cnpj, senha, tipoVaga,fkEnderecoEmp, fkContatoEmp) 
	  						VALUES('$nome', '$cnpj',  '$senha', '$tipoVaga', '$fkEndereco', '$fkContato')"); 
			
	
	 mysqli_close($con); 
	 //redirecionamento após cadastro
	 header("Location: ../html/login.html");
?>