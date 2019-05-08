<?php

require_once "../dao/Dao.php";
//Teste
//verifica $_POST
//escape strings (prepare)

$estudante_id = (new Dao())->save('estudante', $_POST['estudante'], true)[0];

$estudante_instituicao['estudante_id'] = $estudante_id->estudante_id;
$estudante_instituicao['instituicao_id'] = $_POST['instituicao'];
$estudante_instituicao['RA'] = $_POST['RA'];
$estudante_instituicao['curso'] = $_POST['curso'];
$estudante_instituicao['semestre'] = $_POST['semestre'];
$estudante_instituicao['periodo'] = $_POST['periodo'];

(new Dao())->save('estudante_instituicao', $estudante_instituicao);

$endereco_id = (new Dao())->save('endereco', $_POST['endereco'], true)[0];

$estudante_endereco['estudante_id'] = $estudante_id->estudante_id;
$estudante_endereco['endereco_id'] = $endereco_id->endereco_id;

(new Dao())->save('estudante_endereco', $estudante_endereco);

$contato_id = (new Dao())->save('contato', $_POST['contato'], true)[0];

$estudante_contato['estudante_id'] = $estudante_id->estudante_id;
$estudante_contato['contato_id'] = $contato_id->contato_id;

if((new Dao())->save('estudante_contato', $estudante_contato) == true){
    header('Location: ../../pages/login.php');
} else {
    header('Location: ../../pages/estudante/add.php');
}
?>
