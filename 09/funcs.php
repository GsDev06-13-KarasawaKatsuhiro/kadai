<?php

function h($str){
    $Str = htmlspecialchars($str,ENT_QUOTES);
    return $str;//returnによってこの関数の外でも変数として利用できるようになる
}
    
    
    
?>