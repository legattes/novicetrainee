<?php
require_once "Dao.php";

class Estudante extends Dao
{
    public function login($cpf, $pass)
    {
        $query = "SELECT * FROM estudante WHERE cpf = '{$cpf}' and senha = '{$pass}'";
        return parent::_exec($query);
    }

    public function curriculo($id)
    {
        return self::get($id);
    }

    public function info($id)
    {
        $query = "SELECT E.*, C.*, EN.*, EI.* FROM estudante E
        LEFT JOIN estudante_contato EC
        ON E.estudante_id = EC.estudante_id
        LEFT JOIN contato C
        ON C.contato_id = EC.contato_id
        LEFT JOIN estudante_endereco EE
        ON EE.estudante_id = E.estudante_id
        LEFT JOIN endereco EN
        ON EN.endereco_id = EE.endereco_id
        LEFT JOIN estudante_instituicao EI
        ON EI.estudante_id = E.estudante_id
        WHERE E.estudante_id = '{$id}'";

        return self::_exec($query);
    }

    public function endereco($id)
    {
        $query = "SELECT E.* FROM endereco E
        LEFT JOIN estudante_endereco EE
        ON E.endereco_id = EE.endereco_id
        where EE.estudante_id = '{$id}'";

        return self::_exec($query);
    }

    public function contato($id)
    {
        $query = "SELECT C.* FROM contato C
        LEFT JOIN estudante_contato EC
        ON C.contato_id = EC.contato_id
        where EC.estudante_id = '{$id}'";

        return self::_exec($query);
    }

    public function escolaridade($id)
    {
        $query = "SELECT * FROM estudante_instituicao
        WHERE estudante_id = '{$id}'";

        return self::_exec($query);
    }
}
