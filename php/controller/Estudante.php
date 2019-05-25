<?php
require_once "../php/dao/Dao.php";
require_once "../php/Session.php";
require_once "../php/Curriculo.php";
require_once "../php/controller/Prova.php";

class Estudante extends Dao
{
    public function contentGET()
    {
        include('../php/view/estudante/index.php');
    }

    public function addGET()
    {
        include('../php/view/estudante/add.php');
    }

    public function addPOST()
    {
        $estudante_id = $this->save('estudante', $_POST['estudante'], true)[0];

        $estudante_instituicao['estudante_id'] = $estudante_id->estudante_id;
        $estudante_instituicao['instituicao_id'] = $_POST['instituicao'];
        $estudante_instituicao['RA'] = $_POST['RA'];
        $estudante_instituicao['curso_id'] = $_POST['curso'];
        $estudante_instituicao['semestre'] = $_POST['semestre'];
        $estudante_instituicao['periodo'] = $_POST['periodo'];

        $this->save('estudante_instituicao', $estudante_instituicao);

        $endereco_id = $this->save('endereco', $_POST['endereco'], true)[0];

        $estudante_endereco['estudante_id'] = $estudante_id->estudante_id;
        $estudante_endereco['endereco_id'] = $endereco_id->endereco_id;

        $this->save('estudante_endereco', $estudante_endereco);

        $contato_id = $this->save('contato', $_POST['contato'], true)[0];

        $estudante_contato['estudante_id'] = $estudante_id->estudante_id;
        $estudante_contato['contato_id'] = $contato_id->contato_id;

        if ($this->save('estudante_contato', $estudante_contato) == true) {
            header('Location: /');
        } else {
            header('Location: /estudante/add');
        }
    }

    public function editPOST()
    {
        $model = Session::get('model');

        $estudante_id = $model->estudante_id;

        $this->save('estudante_instituicao', $_POST['instituicao'], null, ['estudante_id' => $estudante_id]);

        $endereco_id = $this->endereco($estudante_id)[0];

        $this->save('endereco', $_POST['endereco'], null, ['endereco_id' => $endereco_id->endereco_id]);

        $contato_id = $this->contato($estudante_id)[0];

        if ($this->save('contato', $_POST['contato'], null, ['contato_id' => $contato_id->contato_id]) == true) {
            header('Location: /estudante');
        } else {
            header('Location: /estudante/index.php#atDados');
        }
    }

    public function loginPOST()
    {

        //verifica $_POST
        //escape strings (prepare)

        $cpf = $_POST['cpf'] ?? '';
        $senha = $_POST['senha'] ?? '';

        if ($senha == '' || $cpf == '') {
            Session::loggout();
        }

        $login = $this->login($cpf, $senha);

        if (empty($login)) {
            Session::loggout();
        } else {
            Session::login('estudante', $login[0]);
            header("Location: /estudante");
        }
    }

    public function loginGET()
    {
        $this->loginPOST();
    }

    public function curriculoGET($args)
    {
        Session::handle();

        $id = $args[1] ?? Session::get('model')->estudante_id;

        if ($id != '' && is_numeric($id)) {
            $curriculo = new Curriculo();
            $curriculo->generate($id);
        }
    }

    public function vagaGET($args)
    {
        $vaga['estudante_id'] = Session::get('model')->estudante_id;
        $vaga['vaga_id'] = $args[1];

        if ($this->save('estudante_vaga', $vaga) == true) {
            //generate TOKEN
            header('Location: /estudante');
        } else {
            header('Location: /estudante');
        }
    }

    public function regrasGET($args)
    {
        include('../php/view/estudante/regras.php');
    }

    public function provaGET($args)
    {
        include('../php/view/estudante/prova.php');
    }

    public function provaPOST($args)
    {
        $prova_id = $args[1];
        $respostas = $_POST['resposta'];

        foreach ($respostas as $index => $pergunta) {
            (new Dao())->save('prova_estudante', [
                'prova_id' => $prova_id,
                'estudante_id' => Session::get('model')->estudante_id,
                'pergunta_id' => $index,
                'resposta_id' => $respostas[$index]
            ]);
        }
        header("Location: /estudante");
        //Prova::validateToken($prova_id);
    }

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
        $query = "SELECT E.*, C.*, EN.*, EI.*, I.nome as instituicao, CU.nome as curso_nome FROM estudante E
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

        LEFT JOIN curso CU
        ON EI.curso_id = CU.curso_id

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

    public function vagas($id)
    {
        $query = "SELECT V.vaga_id, V.nome, V.remuneracao, V.periodo, EM.nome_fantasia FROM vaga V
        LEFT JOIN estudante_instituicao EI
        on V.curso_id = EI.curso_id
        LEFT JOIN estudante E
        on EI.estudante_id = E.estudante_id
        LEFT JOIN empresa EM
        on V.empresa_id = EM.empresa_id
        WHERE E.estudante_id = '{$id}' and V.vaga_id NOT IN (SELECT vaga_id from estudante_vaga where E.estudante_id = '{$id}')";

        return self::_exec($query);
    }

    public function participando($id)
    {
        $query = "SELECT V.vaga_id, V.nome, V.remuneracao, V.periodo, EM.nome_fantasia FROM vaga V
        LEFT JOIN estudante_vaga EV
        on V.vaga_id = EV.vaga_id
        LEFT JOIN empresa EM
        on V.empresa_id = EM.empresa_id
        WHERE EV.estudante_id = '{$id}'";

        return self::_exec($query);
    }
}
