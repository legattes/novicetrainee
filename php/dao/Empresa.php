<?php
require_once "Dao.php";

class Empresa extends Dao
{

    public function vagas($id)
    {
        $query = "SELECT V.*, C.nome as curso_nome FROM vaga V       
        LEFT JOIN curso C
        ON V.curso_id = C.curso_id
        WHERE empresa_id = '{$id}'";

        return parent::_exec($query);
    }

    public function login($cnpj, $pass)
    {
        $query = "SELECT * FROM empresa WHERE cnpj = '{$cnpj}' and senha = '{$pass}'";

        return parent::_exec($query);
    }

    public function info($id)
    {
        $query = "SELECT E.*, C.*, EN.* FROM empresa E
        LEFT JOIN empresa_contato EC
        ON E.empresa_id = EC.empresa_id
        LEFT JOIN contato C
        ON C.contato_id = EC.contato_id
        LEFT JOIN empresa_endereco EE
        ON EE.empresa_id = E.empresa_id
        LEFT JOIN endereco EN
        ON EN.endereco_id = EE.endereco_id
        WHERE E.empresa_id = '{$id}'";

        return self::_exec($query);
    }

    public function endereco($id)
    {
        $query = "SELECT E.* FROM endereco E
        LEFT JOIN empresa_endereco EE
        ON E.endereco_id = EE.endereco_id
        where EE.empresa_id = '{$id}'";

        return self::_exec($query);
    }

    public function contato($id)
    {
        $query = "SELECT C.* FROM contato C
        LEFT JOIN empresa_contato EC
        ON C.contato_id = EC.contato_id
        where EC.empresa_id = '{$id}'";

        return self::_exec($query);
    }
}
