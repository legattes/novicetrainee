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

    /*protected function cpf($cpf){

    }

    protected function cnpj($cnpj){

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
