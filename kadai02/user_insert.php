<?php
//1. POSTデータ取得
//$name  = filter_input( INPUT_GET,  "name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ

$u_name    = $_POST["u_name"];
$u_id      = $_POST["u_id"];
$u_pw      = $_POST["u_pw"];
$life_flg  = $_POST["life_flg"];
$kanri_flg = $_POST["kanri_flg"];
$indate   = $_POST["indate"];
//2. DB接続します
include("funcs.php");
$pdo = dbcon();

//３．データ登録SQL作成 セキュリティ処理
$stmt = $pdo->prepare("INSERT INTO gs_logtest(u_name,u_id,u_pw,life_flg,kanri_flg,indate)VALUES(:u_name,:u_id,:u_pw,:life_flg,:kanri_flg,sysdate())");
// $stmt = $pdo->prepare("INSERT INTO gs_an_table(name,email,age,naiyou,indate)VALUES('むらさわ','test01@test.jp',37,'備考１',sysdate())");
$stmt->bindValue(':u_name',    $u_name,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':u_id',      $u_id,      PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':u_pw',      $u_pw,      PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':life_flg',  $life_flg,  PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)

// $stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);
$status = $stmt->execute();//結果:false=エラー

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo(); //エラー取得の関数→配列で戻ってくる
  exit("SQLError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
header("Location: login.php");
exit();

}
?>