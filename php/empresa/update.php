<?php

require_once "../dao/Dao.php";
require_once "../dao/Empresa.php";
require_once "../Session.php";

//verifica $_POST
//escape strings (prepare)

$model = Session::get('model');

$empresa_id = $model->empresa_id;

$endereco_id = (new Empresa())->endereco($empresa_id)[0];

(new Dao())->save('endereco', $_POST['endereco'], null, ['endereco_id' => $endereco_id->endereco_id]);

$contato_id = (new Empresa())->contato($empresa_id)[0];

if((new Dao())->save('contato', $_POST['contato'], null, ['contato_id' => $contato_id->contato_id]) == true){
    header('Location: ../../pages/empresa/dashboard.php');
} else {
    header('Location: ../../pages/empresa/dashboard#atDados.php');
}
?>
