<?php
session_start();
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

//接続
include("funcs.php");
$pdo = dbcon();

//２．データ登録SQL作成
$sql = "SELECT * FROM gs_logtest WHERE u_id=:lid AND u_pw=:lpw";
$stmt = $pdo->prepare($sql);
$stmt->bindvalue(':lid', $lid);
$stmt->bindvalue(':lpw', $lpw);
$res = $stmt->execute();

//SQLエラー
if($res==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}

//3抽出データ数取得
//$count = $stmt->fetchColumn();//SELECT COUNT(*)で使用可能()
$val = $stmt->fetch();//1レコードのみ取得

//4該当レコードあればSESSIONに代入
if( $val["id"] !=""){
    $_SESSION["chk_ssid"]  = session_id();
    $_SESSION["u_name"] = $val['u_name'];
    // $_SESSION["name"]      = $val['name'];
//Okの場合移動
    header("Location: select.php");
}else{
//NGの場合戻る
    header("Location: login.php");
}
//終了
exit();
?>