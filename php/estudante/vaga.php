<?php

require_once "../dao/Dao.php";

//verifica $_POST
//escape strings (prepare)
$vaga['estudante_id']= $_GET['id'];
$vaga['vaga_id']= $_GET['vaga'];

if((new Dao())->save('estudante_vaga', $vaga) == true){
    echo 'ok';
   // header('Location: ../../pages/login.php');
} else {
    echo 'nao';
   // header('Location: ../../pages/estudante/add.php');
}
?>
