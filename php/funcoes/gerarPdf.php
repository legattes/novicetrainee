<?php
/*-----------------Conexão com o BD-------------*/
		include_once("conexao.php");
		
	//O tipo de caracteres a ser usado
    header('Content-Type: text/html; charset=utf-8');

/*-----------------------------SELECT ESTUDANTE----------------------------------*/
$selectEstudante = mysqli_query($con,"SELECT * FROM Estudante");
	$idEstudante = mysqli_insert_id($con);

/*-----------------------------SELECT ENDERECO----------------------------------*/
$selectEndereco = mysqli_query($con,"SELECT * FROM Endereco ");
	$idEndereco = mysqli_insert_id($con);

/*-----------------------------SELECT ESTADO----------------------------------*/
$selectEstado = mysqli_query($con,"SELECT nomeEstado FROM Estados");
	$idEstado = mysqli_insert_id($con);

/*-----------------------------SELECT CONTATO----------------------------------*/
$selectContato = mysqli_query($con,"SELECT * FROM Contato");
	$idContato = mysqli_insert_id($con);

/*-----------------------------SELECT ESCOLARIDADE----------------------------------*/
$selectEscolaridade = mysqli_query($con,"SELECT * FROM Escolaridade");
	$idEscolaridade = mysqli_insert_id($con);

/*-----------------------------SELECT INSTITUIÇÃO----------------------------------*/
$selectInstituicao = mysqli_query($con,"SELECT * FROM Instituicao");
	$idInstituicao = mysqli_insert_id($con);

/*-----------------------------ARMAZENANDO O RETORNO ESTUDANTE-------------------------------*/
	while($row = mysqli_fetch_assoc($selectEstudante))
	{
		$nome     = $row['nome'];// nome da coluna
		$dataNasc = $row['dataNasc'];
	}

/*-----------------------------ARMAZENANDO O RETORNO ENDEREÇO-------------------------------*/
	while($row = mysqli_fetch_assoc($selectEndereco))
	{
		$cidade = $row['cidade'];// nome da coluna
		$bairro = $row['bairro'];
		$rua    = $row['rua'];
		$numero = $row['numero'];
	}

/*-----------------------------ARMAZENANDO O RETORNO ESTADO-------------------------------*/
	while($row = mysqli_fetch_assoc($selectEstado))
	{
		$estado = $row['nomeEstado'];// nome da coluna
	}

/*-----------------------------ARMAZENANDO O RETORNO CONTATO-------------------------------*/
//$selectContato = mysqli_query($con);
	while($row = mysqli_fetch_assoc($selectContato))
	{
		$email     = $row['email'];// nome da coluna
		$telefone  = $row['telefone'];
		$celular   = $row['celular'];
		$telRecado = $row['telRecado'];
	}

/*-----------------------------ARMAZENANDO O RETORNO ESCOLARIDADE-------------------------------*/
//$selectEscolaridade = mysqli_query($con);
	while($row = mysqli_fetch_assoc($selectEscolaridade))
	{
		$graduacao = $row['graduacao'];// nome da coluna
		$curso     = $row['curso'];
		$semestre  = $row['semestre'];
		$periodo   = $row['periodo'];
	}
/*-------------------------ARMAZENANDO O RETORNO DA INSTITUIÇÃO--------------------------------------*/
//$selectInstituicao = mysqli_query($con);
	while($row1 = mysqli_fetch_assoc($selectInstituicao))
	{
		$instituicao = $row1['nomeInstituicao'];// nome da coluna
	}

/*------------Gerar PDF com PHP com informações do BD utilizando a classe domPdf---------------------*/


	/*referenciar o DomPDF com namespace*/
	use Dompdf\Dompdf;

	/*include autoloader*/
	require_once("../domPdf/autoload.inc.php");

	//Criando instancia*/
	$domPdf = new DOMPDF();

	//Carrega o HTML abaixo*/ 
	$domPdf->load_html('<center><img src="../img/aruivoEnviar.png" /><br><center><h1>Currículo</h1></center>
					<br><br>
							 <h2>Informações Gerais</h2>
					<br>
							 <h3>Nome: </h3>'.$nome.'
					<br>
							 <h3>Data de Nascimento:</h3> '.$dataNasc.'
					<br>
							 <h3>Telefone:</h3> '.$telefone.'
					<br>
							 <h3>Email:</h3> '.$email.'
					<br>
							 <h3>Celular:</h3> '.$celular.'
					<br>
							 <h3>Telefone para Recado:</h3> '.$telRecado.'
					<br><br>
							 <h2>Estado</h2><br>
					<br>
							 <h3>Estado:</h3> '.$estado.'
					<br>
							 <h3>Cidade:</h3> '.$cidade.'
					<br>
							 <h3>Bairro:</h3> '.$bairro.'
					<br>
							 <h3>Rua</h3> '.$rua.'
					<br>
							 <h3>Numero:</h3> '.$numero.'
					<br><br>
							 <h2>Escolaridade</h2>
					<br>
							 <h3>Graduação:</h3> '.$graduacao.'
					<br>
							 <h3>Instituição:</h3> '.$instituicao.'
					<br>
							 <h3>Curso:</h3> '.$curso.'
					<br>
							 <h3>Semestre</h3> '.$semestre.'
					<br>
							 <h3>Periodo:</h3> '.$periodo.'
					<br>
					</center>');

	//Renderizar o html*/
	$domPdf->render();

	//Exibir a página*/
	$domPdf->stream(
					"curriculo.pdf",
					array("Attachment" => true)//Para realizar odownload somente alterar para true.
				);

	if($domPdf != null)
	{
		echo"Currículo gerado com sucesso!";
	}
	else
	{
		echo"Falha ao gerar o currículo.";
	}
	

/*-----------------------------------------------------------------------------------------------------*/
?>