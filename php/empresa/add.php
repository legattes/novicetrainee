<?php

require_once "../dao/Dao.php";
require_once "../Validation.php";

//verifica $_POST
//escape strings (prepare)
if((new Validation())->post($_POST,[
    'cnpj',
    'nome_fantasia',
    'razao_social',
    'senha',
    'email',
    'celular',
    'telefone',
    'cidade',
    'estado',
    'cep',
    'bairro',
    'rua',
    'numero']) != true){
        header('Location: ../../pages/empresa/add.php');
        die();
} 


$empresa_id = (new Dao())->save('empresa', $_POST['empresa'], true)[0];

$empresa_endereco['empresa_id'] = $empresa_id->empresa_id;
$empresa_endereco['endereco_id'] = (new Dao())->save('endereco', $_POST['endereco'], true)[0]->endereco_id;

(new Dao())->save('empresa_endereco', $empresa_endereco);

$empresa_contato['empresa_id'] = $empresa_id->empresa_id;
$empresa_contato['contato_id'] = (new Dao())->save('contato', $_POST['contato'], true)[0]->contato_id;

if((new Dao())->save('empresa_contato', $empresa_contato) == true){
    header('Location: ../../pages/login.php');
} else {
    header('Location: ../../pages/empresa/add.php');
}
