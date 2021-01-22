<?php
session_start();
include("funcs.php");
loginCheck();

//1.  DB接続します

$pdo = dbcon();

//２．データ登録SQL作成
$stmt   = $pdo->prepare("SELECT * FROM gs_logtest");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる FETCHは一回のみ処理
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
    //getリンク作成
    $view .="<div>";
    $view .='<a href="u_edit.php?id='.$res["id"].'">';
    $view .= $res["id"]."-".$res["u_name"]."-".$res["u_id"]."-".$res["u_pw"]."-".$res["life_flg"]."-".$res["kanri_flg"]."-".$res["in_date"];
    $view .='</a>';
    $view .='　';
    $view .='<a href="delete.php?id='.$res["id"].'">';
    $view .='[削除]';
    $view .='</a>';
    $view .="</div>";
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>本の個人データベース表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
<nav class="navbar navbar-default">
<div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="index.php">データ登録に戻る</a>
    <a class="navbar-brand" href="user_index.php">ユーザー新規登録へ</a>
    <a class="navbar-brand" href="logout.php">ログアウト</a>
    </div>
</div>
</nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<p>タイトルクリックでデータの更新</p>
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>

<!-- Main[End] -->

</body>
</html>
