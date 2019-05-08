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
        $query = "SELECT E.*, C.*, EN.*, EI.*, I.nome as instituicao FROM estudante E
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

        LEFT JOIN instituicao I
        ON EI.instituicao_id = I.instituicao_id

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

    public function vagas($id){
        $query = "SELECT V.vaga_id, V.nome, V.remuneracao, V.periodo, EM.nome_fantasia FROM vaga V
        LEFT JOIN estudante_instituicao EI
        on V.curso_id = EI.curso_id
        LEFT JOIN estudante E
        on EI.estudante_id = E.estudante_id
        LEFT JOIN empresa EM
        on V.empresa_id = EM.empresa_id
        WHERE E.estudante_id = '{$id}'";

        return self::_exec($query);
    }

    public function participando($id){
        $query = "SELECT V.vaga_id, V.nome, V.remuneracao, V.periodo, EM.nome_fantasia FROM vaga V
        LEFT JOIN estudante_vaga EV
        on V.vaga_id = EV.vaga_id
        LEFT JOIN empresa EM
        on V.empresa_id = EM.empresa_id
        WHERE EV.estudante_id = '{$id}'";

        return self::_exec($query);
    }
}
