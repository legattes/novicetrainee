<?php

session_start();

include('funcoes/conexao.php');
 
if(empty($_POST['cpf']) || empty($_POST['senhaAluno'])) {
	header('Location: ../html/login.html');
	exit();
}
 
$cpf = mysqli_real_escape_string($con, $_POST['cnpj']);
$senha = mysqli_real_escape_string($con, $_POST['senhaEmpresa']);
 
$query = "SELECT * FROM Estudante WHERE cpf = '$cpf'  and senha = '$senha'";
 
$resultID = mysqli_query($con, $query);
 
if (!$resultID) {
    $_SESSION['nao_autenticado'] = true;
	header('Location: ../html/login.html');
    exit();
}
else
{
	$nomeEmp  = $dados['cnpj'];
	$senhaEmp = $dados['senhaEmpresa'];
	$idEmp    = $dados['idEsmpresa'];
	echo "LOGIN EFETUADO COM SUCESSO!!!!!!!!!!!!!";
    header('Location: ../html/areaEstudante.html');
}
?>

