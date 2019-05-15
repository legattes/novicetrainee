<?php
require_once "../php/dao/Dao.php";
require_once "../php/Session.php";
require_once "../php/model/Vaga.php";
require_once "../php/Validation.php";

class Empresa extends Dao
{

    public function loginPOST()
    {

        //verifica $_POST
        //escape strings (prepare)

        $cnpj = $_POST['cnpj'] ?? '';
        $senha = $_POST['senha'] ?? '';

        if ($senha == '' || $cnpj == '') {
            Session::loggout();
        }

        $login = $this->login($cnpj, $senha);

        if (empty($login)) {
            Session::loggout();
        } else {
            Session::login('empresa', $login[0]);
            header("Location: /empresa");
        }
    }

    public function loginGET()
    {
        $this->loginPOST();
    }

    public function contentGET()
    {
        include('../php/view/empresa/index.php');
    }

    public function addGET()
    {
        include('../php/view/empresa/add.php');
    }

    public function vagaGET($args){
        include('../php/view/empresa/vaga.php');
    }

    public function addPOST()
    {
        if ((new Validation())->post($_POST, [
            'cnpj',
            'nome_fantasia',
            'razao_social',
            'senha',
            'email',
            'celular',
            'telefone',
            'cidade',
            'estado',
            'cep',
            'bairro',
            'rua',
            'numero'
        ]) != true) {
            header('Location: /empresa/add');
            die();
        }

        $empresa_id = $this->save('empresa', $_POST['empresa'], true)[0];

        $empresa_endereco['empresa_id'] = $empresa_id->empresa_id;
        $empresa_endereco['endereco_id'] = $this->save('endereco', $_POST['endereco'], true)[0]->endereco_id;

        $this->save('empresa_endereco', $empresa_endereco);

        $empresa_contato['empresa_id'] = $empresa_id->empresa_id;
        $empresa_contato['contato_id'] = $this->save('contato', $_POST['contato'], true)[0]->contato_id;

        if ($this->save('empresa_contato', $empresa_contato) == true) {
            header('Location: /');
        } else {
            header('Location: /empresa/add');
        }
    }

    public function editPOST()
    {
        $model = Session::get('model');

        $empresa_id = $model->empresa_id;

        $endereco_id = $this->endereco($empresa_id)[0];

        $this->save('endereco', $_POST['endereco'], null, ['endereco_id' => $endereco_id->endereco_id]);

        $contato_id = $this->contato($empresa_id)[0];

        if ($this->save('contato', $_POST['contato'], null, ['contato_id' => $contato_id->contato_id]) == true) {
            header('Location: /empresa');
        } else {
            header('Location: /empresa');
        }
    }

 

    public function vagaPOST()
    {
        $vaga['nome'] = $_POST['vaga']['nome'];
        $vaga['empresa_id'] = Session::get('model')->empresa_id;
        $vaga['curso_id'] = $_POST['vaga']['curso'];
        $vaga['semestre'] = $_POST['vaga']['semestre'];
        $vaga['periodo'] = $_POST['vaga']['periodo'];
        $vaga['remuneracao'] = $_POST['vaga']['remuneracao'];

        if ($this->save('vaga', $vaga) == true) {
            header('Location: /empresa ');
        } else {
            header('Location: /empresa');
        }
    }

    public function provaGET($args)
    {
        include("../php/view/empresa/prova.php");
    }

    public function provaPOST($args)
    {
        $vaga_id = $args[1];
        $perguntas = $_POST['pergunta'];
        $respostas = $_POST['resposta'];
        $corretas = $_POST['correta'];
        
        $prova_id = (new Dao())->save('prova', ['vaga_id' => $vaga_id], true)[0]->prova_id;

        foreach ($perguntas as $index => $pergunta) {
            $pergunta_id = (new Dao())->save('pergunta', ['texto' => $pergunta], true)[0]->pergunta_id;

            foreach ($respostas[$index] as $key => $resposta) {
                $resposta_id = (new Dao())->save('resposta', ['texto' => $resposta], true)[0]->resposta_id;

                (new Dao())->save('pergunta_resposta', [
                    'pergunta_id' => $pergunta_id,
                    'resposta_id' => $resposta_id,
                    'correta' => ($corretas[$index] == $key) ? '1' : '0'
                ]);
            }

            (new Dao())->save('prova_pergunta', [
                'prova_id' => $prova_id,
                'pergunta_id' => $pergunta_id
            ]);
        }
    }

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
