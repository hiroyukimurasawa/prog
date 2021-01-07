<?php

//文字作成
// $str = date("Y-m-d H:i:s");
include("inc/funcs.php");

$name = $_POST["name"];
$mail = $_POST["mail"];
$a    = "none";
if($name==""){
    $name = "<span style='color:red;'>未入力</span>";
    $a    = "block";
}
if($mail==""){
    $mail = "<span style='color:red;'>未入力</span>";
    $a    = "block";
}
$soba = $_POST["soba"];
$oseti = $_POST["oseti"];
$money = $_POST["money"];
$sdate = $_POST["sdate"];
$str  = $name.",".$mail.",".$soba[0].$soba[1].$soba[2].$soba[3].",".$oseti[0].$oseti[1].$oseti[2].$oseti[3].",".$money[0].$money[1].$money[2].$money[3].",".$sdate;

//File書き込み
$file = fopen("data/data.txt","a");	// ファイル読み込み
fwrite($file, $str."\n");
fclose($file);
?>

<html>
<head>
<meta charset="utf-8">
<title>File書き込み</title>
</head>
<body>

<h1>入力ありがとうございました。</h1>
<h2>表示を押すと確認できます。</h2>

<ul>
<li><a href="input.php">戻る</a></li>
<li><a href="read.php">表示</a></li>
</ul>
</body>
</html>