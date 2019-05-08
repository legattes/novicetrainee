<?php

require_once "../dao/Dao.php";
require_once "../Session.php";

//verifica $_POST
//escape strings (prepare)

$vaga['nome'] = $_POST['vaga']['nome'];
$vaga['empresa_id'] = Session::get('model')->empresa_id;
$vaga['curso_id'] = $_POST['vaga']['curso'];
$vaga['semestre'] = $_POST['vaga']['semestre'];
$vaga['periodo'] = $_POST['vaga']['periodo'];
$vaga['remuneracao'] = $_POST['vaga']['remuneracao'];

 if((new Dao())->save('vaga', $vaga) == true){
    header('Location: ../../pages/empresa/dashboard.php ');
 } else {
    header('Location: ../../pages/empresa/dashboard.php#CadastrarVag');
 }
?>