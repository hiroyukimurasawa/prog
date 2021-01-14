<?php
//1. POSTデータ取得
//$name  = filter_input( INPUT_GET,  "name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ

$b_name    = $_POST["b_name"];
$b_url     = $_POST["b_url"];
$b_cm      = $_POST["b_cm"];
$in_date   = $_POST["in_date"];
//2. DB接続します
include("funcs.php");
$pdo = dbcon();

//３．データ登録SQL作成 セキュリティ処理
$stmt = $pdo->prepare("INSERT INTO gskadai_bm(b_name,b_url,b_cm,in_date)VALUES(:b_name,:b_url,:b_cm,sysdate())");
// $stmt = $pdo->prepare("INSERT INTO gs_an_table(name,email,age,naiyou,indate)VALUES('むらさわ','test01@test.jp',37,'備考１',sysdate())");
$stmt->bindValue(':b_name', $b_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':b_url',  $b_url,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':b_cm',   $b_cm,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);
$status = $stmt->execute();//結果:false=エラー

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo(); //エラー取得の関数→配列で戻ってくる
  exit("SQLError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
header("Location: index.php");
exit();

}
?>