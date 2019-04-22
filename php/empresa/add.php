<?php

require_once "../dao/Dao.php";

//verifica $_POST
//escape strings (prepare)

$empresa_id = (new Dao())->save('empresa', $_POST['empresa'], true)[0];

$endereco_id = (new Dao())->save('endereco', $_POST['endereco'], true)[0];

$empresa_endereco['empresa_id'] = $empresa_id->empresa_id;
$empresa_endereco['endereco_id'] = $endereco_id->endereco_id;

(new Dao())->save('empresa_endereco', $empresa_endereco);

$contato_id = (new Dao())->save('contato', $_POST['contato'], true)[0];

$empresa_contato['empresa_id'] = $empresa_id->empresa_id;
$empresa_contato['contato_id'] = $contato_id->contato_id;

if((new Dao())->save('empresa_contato', $empresa_contato) == true){
    header('Location: ../../pages/login.php');
} else {
    header('Location: ../../pages/empresa/add.php');
}
?>
