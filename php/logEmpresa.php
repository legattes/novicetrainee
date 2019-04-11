<?php
include('funcoes/conexao.php');
 
if(empty($_POST['cnpj']) || empty($_POST['senhaEmpresa'])) {
	header('Location: ../html/login.html');
	exit();
}

$cnpj = mysqli_real_escape_string($con, $_POST['cnpj']);
$senha = mysqli_real_escape_string($con, $_POST['senhaEmpresa']);
 
$query = "SELECT * FROM Empresa WHERE cnpj = '$cnpj'  and senha = '$senha'";
 
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
    header('Location: ../html/areaEmpresa.html');
}
?>

 



    


