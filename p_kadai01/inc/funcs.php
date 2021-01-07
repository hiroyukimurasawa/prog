<?php
//関数
function h($str){
    $s = htmlspecialchars($str,ENT_QUOTES);//無効化
    return $s;
}

?>