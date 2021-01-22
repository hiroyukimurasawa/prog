<?php
session_start();
include("funcs.php");
loginCheck();

//getでid取得
$id = $_GET["id"];
// echo $id;
// exit;
//2. DB接続します

$pdo = dbcon();
//3select文
$sql = "SELECT * FROM gs_logtest WHERE id=:id";
$stmt = $pdo->prepare($sql);
// $stmt = $pdo->prepare("INSERT INTO gs_an_table(name,email,age,naiyou,indate)VALUES('むらさわ','test01@test.jp',37,'備考１',sysdate())");
$stmt->bindValue(':id',$id,PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();//結果:false=エラー
//４．データ表示
$view="";
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo(); //エラー取得の関数→配列で戻ってくる
    exit("SQLError:".$error[2]);
  }else{
    //データのみ抽出はwhileループで取り出さない
  $row = $stmt->fetch();
  }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザーデータ更新</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href="select.php">BOOKデータ一覧の表示はここ</a></div>
        </div>
    </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="user_update.php">
    <div class="jumbotron">
        <fieldset>
        <legend>ユーザーデータ更新</legend>
        <label>ユーザー名：<input type="text" name="u_name" value="<?=$row["u_name"]?>"></label><br>
        <label>ユーザーID：<input type="text" name="u_id" value="<?=$row["u_id"]?>"></label><br>
        <label>ユーザーPW：<input type="text" name="u_pw" value="<?=$row["u_pw"]?>"></label><br>
        <label>life_flg：<input type="text" name="life_flg" value="<?=$row["life_flg"]?>"></label><br>
        <label>kanri_flg：<input type="text" name="kanri_flg" value="<?=$row["kanri_flg"]?>"></label><br>
        <input type="hidden" name="id" value="<?=$row["id"]?>"><!--idも渡す-->
        <input type="submit" value="更新処理">
        </fieldset>
    </div>
</form>
<!-- Main[End] -->

</body>
</html>