<?php
require_once "Dao.php";

class Vaga extends Dao
{
    public function participantes($id){

        $query = "SELECT E.* FROM estudante E
        LEFT JOIN estudante_vaga EV
        ON E.estudante_id = EV.estudante_id
        LEFT JOIN vaga V
        ON EV.vaga_id = V.vaga_id
        WHERE V.vaga_id = '{$id}'";

        return parent::_exec($query);

    }
}
