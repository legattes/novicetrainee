<?php
require_once("vendor/domPdf/autoload.inc.php");
require_once("dao/Estudante.php");
require_once("Session.php");

use Dompdf\Dompdf;

class Curriculo
{
    public static function generate()
    {
        $pdf = new DOMPDF();

        $pdf->load_html(self::html());

        $pdf->render();

        $pdf->stream('curriculo.pdf', ['Attachment' => false]);


        if ($pdf != null) {
            echo "Currículo gerado com sucesso!";
        } else {
            echo "Falha ao gerar o currículo.";
        }
    }

    protected static function html()
    {
        $info = (new Estudante())->curriculo(Session::get('model')->estudante_id)[0];


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
        </style>

            <h1>{$info->nome}</h1>
            <p>lucas.arantes55@gmail.com</p>
            <p>(12) 98837-4380</p>
            <p>{$data_nasc}</p>
            <p>São José dos Campos - SP</p>
            <hr>

            <h2 style='margin-top: 50px'>Formação Acadêmica</h2>
            <p>Instituicao</p>
            <p>Curso</p>
            <p>Semestre</p>

            <h2 style='margin-top: 50px'>Conhecimentos</h2>
            <p>Conhecimento</p>
            <p>Proficiência</p>
            ";

        return $html;
    }
}
