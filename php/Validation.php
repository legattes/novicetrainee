<?php

class Validation
{
    protected function post($post, $requireds){
        $post = $this->escape($post);
        
        foreach($post as $key => $item){
            if(method_exists($this, $key)){
                die();
                if($this->$key($item) == false){
                    return false;
                }
            } else {
                if(empty($item)){
                    return false;
                }
            }

            if(in_array($key, $requireds)){                
                $requireds = array_flip($requireds);
                unset($requireds[$key]);
                $requireds = array_flip($requireds);
            }
        }

        if(count($requireds) == 0){
            return true;
        } else {
            return false;
        }
    }

    protected function cpf($cpf){
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
        
        if (strlen($cpf) != 11) {
            return false;
        }

        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
        return true;
    }

    /*protected function cnpj($cnpj){
        $cnpj = preg_replace('/[^0-9]/', '', $cnpj);        

        if (strlen($cnpj) != 14){
            return false;
        }

        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
        {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
            return false;

        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
        {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        return ($cnpj{13} == ($resto < 2 ? 0 : 11 - $resto));
    }*/

    protected function escape($post){
        $newPost = [];

        foreach($post as $key => $item){
            if(is_array($item)){
                foreach($item as $k => $i){
                    $newPost[$k] = filter_var($i, FILTER_SANITIZE_STRING);
                }
                continue;
            }
            $newPost[$key] = filter_var($item, FILTER_SANITIZE_STRING);
        }

        return $newPost;
    }

    public function __call($function, $arguments){
        if(method_exists($this, $function)){
            return $this->$function(...$arguments);
        } else {
            throw new Exception('função inexistente', 404);
        }
    }
}
