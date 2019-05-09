<?php

require_once "../dao/Dao.php";
require_once "../dao/Estudante.php";
require_once "../Session.php";
//verifica $_POST
//escape strings (prepare)


$model = Session::get('model');

$estudante_id = $model->estudante_id;

(new Dao())->save('estudante_instituicao', $_POST['instituicao'], null, ['estudante_id' => $estudante_id]);

$endereco_id = (new Estudante())->endereco($estudante_id)[0];

(new Dao())->save('endereco', $_POST['endereco'], null, ['endereco_id' => $endereco_id->endereco_id]);

$contato_id = (new Estudante())->contato($estudante_id)[0];

if((new Dao())->save('contato', $_POST['contato'], null, ['contato_id' => $contato_id->contato_id]) == true){
    header('Location: ../../pages/estudante/index.php');
} else {
    header('Location: ../../pages/estudante/index#atDados.php');
}
?>
