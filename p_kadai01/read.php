<?php
    
// ファイルを変数に格納
    $filename = 'data/data.txt';
    
// ファイルを配列に格納し、さらに変数に格納
    $lines = file($filename);
    
?>
    
    <ul>
    
<!-- foreachでファイルの配列をループ処理 -->
    <?php foreach ($lines as $line) : ?>
    
<!-- 配列の要素を1行ずつ<li>タグに埋め込む -->
    <li><?php echo $line; ?></li>
    
<?php endforeach; ?>
</ul>

<?php
    $lines = @file("data/data.txt") or $result = "ファイルが読めません。";
    if ($lines != null){
        $result = '<table border="1">';
        $result .= "<tr><th>NAME</th><th>MAIL</th><th>Q1</th><th>Q2</th><th>Q3</th><th>送信日時</th></tr>";
        for($i = 0;$i < count($lines);$i++){
            $result .= "<tr>";
            $arr = explode(",",$lines[$i]);
            for($j = 0;$j < 6;$j++){
                $result .= "<td>{$arr[$j]}</td>";
            }
            $result .= "</tr>";
        }
        $result .= "</table>";
    }
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>お正月アンケート</title>
    </head>
    <body>
        <h1>お正月アンケート</h1>
        <p><?php echo $result; ?></p>

<ul>
<li><a href="input.php">戻る</a></li>

</ul>
    </body>
</html>