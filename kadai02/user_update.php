<?php
session_start();
include("funcs.php");
loginCheck();

//1. POSTデータ取得
//$name  = filter_input( INPUT_GET,  "name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$id        = $_POST["id"];
$u_name    = $_POST["u_name"];
$u_id      = $_POST["u_id"];
$u_pw      = $_POST["u_pw"];
$life_flg  = $_POST["life_flg"];
$kanri_flg = $_POST["kanri_flg"];

// $in_date   = $_POST["in_date"];
//2. DB接続します

$pdo = dbcon();

//３．UPdate処理
$sql ='UPDATE gs_logtest SET u_name=:u_name,u_id=:u_id,u_pw=:u_pw,life_flg=:life_flg,kanri_flg=:kanri_flg WHERE id=:id';
$stmt = $pdo->prepare($sql);
// $stmt = $pdo->prepare("INSERT INTO gs_an_table(name,email,age,naiyou,indate)VALUES('むらさわ','test01@test.jp',37,'備考１',sysdate())");
$stmt->bindValue(':u_name',    $u_name,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':u_id',      $u_id,      PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':u_pw',      $u_pw,      PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':life_flg',  $life_flg,  PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id',        $id,        PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)idも渡す
// $stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);
$status = $stmt->execute();//結果:false=エラー

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo(); //エラー取得の関数→配列で戻ってくる
  exit("SQLError:".$error[2]);
}else{
  //５．select.phpへリダイレクト
header("Location: userlist.php");
exit();

}
?>