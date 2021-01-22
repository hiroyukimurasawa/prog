<?php
//共通に使う関数を記述

//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続関数
function dbcon(){
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=kadai_bm;charset=utf8;host=localhost','root','root');
    
    return $pdo;
    } catch (PDOException $e) {
        exit('DBConnectionError:'.$e->getMessage());//exitは処理をストップ
    }
}

//LOGIN認証チェック
function loginCheck(){
    if( !isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
        echo "LOGIN Error!";
        exit();
    }else{
        session_regenerate_id(true);
        $_SESSION["chk_ssid"] = session_id();
    }
}
?>
