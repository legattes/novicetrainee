<?php
require_once "../php/dao/Dao.php";
require_once "../php/Session.php";

class Vaga extends Dao
{
    public function participantes($vaga_id){
        $query = "SELECT E.* FROM estudante E
        LEFT JOIN estudante_vaga EV
        ON E.estudante_id = EV.estudante_id
        LEFT JOIN vaga V
        ON EV.vaga_id = V.vaga_id
        WHERE V.vaga_id = '{$vaga_id}'";

        return parent::_exec($query);
    }

    public function prova($id){
        $query = "SELECT* FROM prova
        where vaga_id = '{$id}'";

        return parent::_exec($query);
    }
}
?>