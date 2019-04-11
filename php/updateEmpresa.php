<?php
include("funcoes/conexao.php");

if(isset($_GET["edit"]))
{
	$cnpj = $_GET["edit"];
	$result = mysqli_query($con, "SELECT * FROM Empresa WHERE cnpj = $cnpj") or die(mysqli_error());

	if(count($result)==1)
	{
		$row = $result->fetch_array();

		$nome = $row["nome"];
		$cnpjEmprea = $row["cnpj"];
	}
}
if(isset($_POST['update']))
{
	//por todas as variáveis, verificar qual está vazia!!
	$id = $_POST['id'];
	$name= $_POST['location'];


	$updateEmpresa = mysqli_query($con, "UPDATE NomeTabela SET `cidade`=[value-3],`bairro`=[value-4],`cep`=[value-5],`rua`=[value-6],`numero`=[value-7],`complemento`=[value-8] WHERE cnpj = $cnpj")

	$_SESSION['messagem'] = "Atulaizado com sucesso!"
}
?>

