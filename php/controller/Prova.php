<?php
require_once "../php/dao/Dao.php";
require_once "../php/Session.php";

class Prova extends Dao
{
    public function perguntaGET()
    {
        echo "<div class='pergunta'><span>Enunciado</span>
        <textarea style='display: block' name='pergunta[]'></textarea>
        <div id='' class='btn btn-primary new-answer'>
        <span>Nova Resposta</span></div>
        <div class='respostas'></div></div>";
    }

    public function respostaGET()
    {
        echo "<div class='resposta'>
        <span>Resposta</span>
        <input type='text' name='resposta[][]'>
        <input type='radio' name='correta[]' value=''>
        <span>Correta</span></div>";
    }

    public function perguntas($prova_id)
    {
        $query = "SELECT PR.* FROM pergunta PR
        LEFT JOIN prova_pergunta PP
        ON PR.pergunta_id = PP.pergunta_id
        WHERE PP.prova_id = '{$prova_id}'";

        return parent::_exec($query);
    }

    public function respostas($pergunta_id)
    {
        $query = "SELECT R.* FROM resposta R
        LEFT JOIN  pergunta_resposta PR
        ON R.resposta_id = PR.resposta_id
        WHERE PR.pergunta_id = '{$pergunta_id}'";

        return parent::_exec($query);
    }

    public function perguntaResposta($pergunta_id){
        $query = "SELECT PR.pergunta_id, PR.resposta_id, PR.correta, R.texto FROM resposta R
        LEFT JOIN  pergunta_resposta PR
        ON R.resposta_id = PR.resposta_id
        WHERE PR.pergunta_id = '{$pergunta_id}'";

        return parent::_exec($query);
    }

    public static function generateToken($prova_id)
    {
        $model = Session::get('model');

        $token = md5($prova_id . $model->estudante_id . $model->cpf);

        $this->save('prova_token', [
            'prova_id' => $prova_id,
            'estudante_id' => $model->estudante_id,
            'token' => $token,
            'validade' => '1'
        ]);
    }

    public static function validateToken($prova_id)
    {
        $model = Session::get('model');

        $validateToken = md5($prova_id . $model->estudante_id . $model->cpf);

        $query = "SELECT * FROM prova_token WHERE prova_id = '{$prova_id}' and estudante_id = '{$model->estudante_id}'";

        $prova_token = parent::_exec($query);

        if(empty($prova_token)){
            return false;
        }

        if ($validateToken == $prova_token[0]->token && $prova_token[0]->validade == '1') {
            $this->save(
                'prova_token',
                [
                    'prova_id' => $prova_id,
                    'estudante_id' => $model->estudante_id,
                    'token' => $prova_token[0]->token,
                    'validade' => '0'
                ],
                false,
                [
                    'prova_id' => $prova_id,
                    'estudante_id' => $model->estudante_id,
                    'token' => $prova_token[0]->token
                ]
            );

            return true;
        } else if ($prova_token[0]->validade == '0'){
            return false;
        }
    }
}
