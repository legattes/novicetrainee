<?php
require_once "Model.php";

class Vaga extends Model
{
    public function save($id = null)
    {
        if ($id == null) {
            return parent::_insert('vaga', $_POST);
        } else {
            return parent::_update('vaga', $_POST, $id);
        }
    }

    public function get($id)
    {
        return parent::_select('vaga', $id);
    }

    public function all()
    {
        return parent::_select('vaga');
    }
}
