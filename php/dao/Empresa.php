<?php
require_once "Model.php";

class Empresa extends Model
{
    public function save($id = null)
    {
        if ($id == null) {
            return parent::_insert('estudante', $_POST);
        } else {
            return parent::_update('estudante', $_POST, $id);
        }
    }

    public function get($id)
    {
        return parent::_select('estudante', $id);
    }

    public function all()
    {
        return parent::_select('estudante');
    }

    public function getVagas($id)
    {
        $query = "SELECT * FROM vagas 
        WHERE empresa_id = '{$id}'";

        return parent::_exec($query);
    }

    public function login($cnpj, $pass){
        $query = "SELECT * FROM empresa WHERE cnpj = '{$cnpj}' and senha = '{$pass}'";

        return parent::_exec($query);
    }
}
