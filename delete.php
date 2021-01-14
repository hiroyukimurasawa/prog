<?php
//1. GETデータ取得
$id = $_GET["id"];

//2. DB接続します
include("funcs.php");
$pdo = dbcon();

//３．UPdate処理
$sql ='DELETE FROM gskadai_bm WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id',     $id,     PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)idも渡す
// $stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);
$status = $stmt->execute();//結果:false=エラー

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo(); //エラー取得の関数→配列で戻ってくる
  exit("SQLError:".$error[2]);
}else{
  //５．select.phpへリダイレクト
header("Location: select.php");
exit();

}
?>