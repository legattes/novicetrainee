<?php
require_once "Model.php";

class Instituicao extends Model
{
    public function save($id = null)
    {
        if ($id == null) {
            return parent::_insert('instituicao', $_POST);
        } else {
            return parent::_update('instituicao', $_POST, $id);
        }
    }

    public function get($id)
    {
        return parent::_select('instituicao', $id);
    }

    public function all()
    {
        return parent::_select('instituicao');
    }
}
