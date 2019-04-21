<?php

class Token{

public static function generate($token, $content){
    $path = 'tokens/' . $token;
    $stream = fopen($path, 'w');
    fwrite($stream, $content);
    fclose($stream);
}

public static function validate($token){
    $path = 'tokens/' . $token;

    if(!file_exists($path)){
        return false;
    }

    $file = json_decode(file_get_contents($path));

    $until = str_replace('T', ' ', $file->until);

    $now = date('Y-m-d H:i');

    if($now < $until){
        return 'true';
    } else {
        return 'false';
    }

}
}
?>
