<?php

require_once "Session.php";
require_once "dao/Empresa.php";
require_once "dao/Estudante.php";

//verifica $_POST
//escape strings (prepare)

$cpf = $_POST['cpf'] ?? '';
$cnpj = $_POST['cnpj'] ?? '';
$senha = $_POST['senha'] ?? '';
$page = '';

if($senha == ''){
    Session::loggout();
}

if($cpf != ''){
    $login = (new Estudante())->login($cpf, $senha);
    $page = 'estudante';
} else if ($cnpj != ''){
    $login = (new Empresa())->login($cnpj, $senha);
    $page = 'empresa';
}

if(empty($login)){
    Session::loggout();
} else {
    Session::login($page, $login[0]);
    header("Location: ../pages/{$page}/index.php");
}

?>
