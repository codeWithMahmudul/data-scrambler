<?php


function scrambleData($originalData, $key_main_original){
    $original_key = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    $data = '';
    $length = strlen($originalData);
    for($i=0; $i<$length; $i++){
        $currentChar = $originalData[$i];
        $position = strpos($original_key,$currentChar);
        if($position !== false){
            $data .= $key_main_original[$position];
        }else{
            $data .= $currentChar;
        }
    }
    return $data;
}

function decodeData($originalData, $key_main_original){
    $original_key = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    $data = '';
    $length = strlen($originalData);
    for($i=0; $i<$length; $i++){
        $currentChar = $originalData[$i];
        $position = strpos($key_main_original,$currentChar);
        if($position !== false){
            $data .= $original_key[$position];
        }else{
            $data .= $currentChar;
        }
    }
    return $data;
}
function display($key){
   
    printf(" Value = %s", $key);

}