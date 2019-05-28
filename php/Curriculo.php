<?php
require_once("vendor/domPdf/autoload.inc.php");
require_once("controller/Estudante.php");
require_once("Session.php");

use Dompdf\Dompdf;

class Curriculo
{
    public function generate($id = null)
    {
        if($id == null) {
            $id = Session::get('model')->estudante_id;
        }

        $pdf = new DOMPDF();

        ob_get_contents();
        $pdf->load_html($this->html($id));
        ob_clean();

        $pdf->render();

        $pdf->stream('curriculo.pdf', ['Attachment' => false]);


        if ($pdf != null) {
            echo "Currículo gerado com sucesso!";
        } else {
            echo "Falha ao gerar o currículo.";
        }
    }

    protected function html($id)
    {
        $info = (new Estudante())->info($id)[0];
       // echo '<pre>';
       // print_r($info);
       // die();

        //mask data_nasc
        $data_nasc = explode('-', $info->data_nasc);
        $data_nasc = $data_nasc[2] . '/' . $data_nasc[1] . '/' . $data_nasc[0]; 

        $html = "
        <style>
            p {
                margin: 0 ;
            }

            body{
                padding: 0 1em;
            }

            .bold{
                font-weight: 700;
            }
        </style>

            <h1>{$info->nome}</h1>
            <p>{$info->email}</p>
            <p>". self::mask('(##) ####-####', $info->telefone) ." | " . self::mask('(##) #####-####', $info->celular) . "</p>
            <p>{$data_nasc}</p>
            <p>{$info->cidade} - {$info->estado}</p>
            <hr>

            <h2 style='margin-top: 50px'>Formação Acadêmica</h2>
            <p class='bold'>Instituicao</p>
            <p>{$info->instituicao}</p>
            <p class='bold'>Curso</p>
            <p>{$info->curso_nome}</p>
            <p class='bold'>Semestre</p>
            <p>{$info->semestre}</p>

            <!--<h2 style='margin-top: 50px'>Conhecimentos</h2>
            <p>Conhecimento</p>
            <p>Proficiência</p>-->
            ";

        return $html;
    }

    public static function mask($mask,$str){
        $str = str_replace(" ","",$str);
    
        for($i=0;$i<strlen($str);$i++){
            $mask[strpos($mask,"#")] = $str[$i];
        }
    
        return $mask;    
    }
}
