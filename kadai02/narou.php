<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>BOOKデータ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href="select.php">BOOKデータ一覧</a></div>
        </div>
    </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->

<!-- Main[End] -->
<?php
define("EOL", "\n\r<br>");//改行を簡略化(End Of Line)
  $filePath = "./novels.dat";     //入力①
  $order = "dailypoint";          //入力②
  $limit = 5;                     //入力③
  $myUserAgent = "Your UserAgent";//入力④
  // ファイルが無い場合のみAPIを読み込む
//   if( !file_exists($filePath) ){
      echo "APIにアクセスして情報をファイルに保存します。相対パス：「{$filePath}」".EOL.EOL;
      $url = "https://api.syosetu.com/novelapi/api/?out=php&order={$order}&lim={$limit}";
      $option = array(
        'http' => array(
            'method'=> "GET",
            'header'=> "User-Agent:".$myUserAgent
         ) );
      $context = stream_context_create($option);
      $novels = unserialize(file_get_contents($url, false, $context));//APIから取得
      sleep(3);//API負荷防止、3秒スリープ
      file_put_contents($filePath, serialize($novels));//ローカルに保存
//   ファイルがあればローカルから読み込む
//   } else {
//       echo "APIにアクセスせずファイルから読み込みます。相対パス：「{$filePath}」".EOL.EOL;
//       $novels = unserialize(file_get_contents($filePath));
//   }
  unset($novels[0]);//配列0番目の「allcount」を消す。消さない場合はコメントアウト
  //foreachでの出力（一部項目）
  echo "【ポイント・タイトル・作者のみ表示】".EOL;
  foreach($novels as $key => $novel){
    $dailyPoint = $novel['daily_point'];
    $title      = $novel['title'];
    $writer     = $novel['writer'];
    $story      = $novel['story'];
    $novelurl   = 'http://ncode.syosetu.com/'.strtolower($novel['ncode']).'/';
    // echo "{$key}／{$dailyPoint}ポイント／{$writer}／{$title}／{$novelurl}".EOL;
    echo "{$key}／{$dailyPoint}ポイント／<a href=$novelurl target='_blank'>$title</a>／{$writer}／{$story}／".EOL;
    
  }
  echo EOL;
  //forでの出力（全項目）
  // echo "【全項目の表示】".EOL;
  // for($i=1; $i <= count($novels); $i++){
  //   print_r($novels[$i]);
  //   echo EOL;
  // }
?>
<form method="POST" action="insert.php">
    <div class="jumbotron">
        <fieldset>
        <legend>本のデータ登録</legend>
        <label>本の名前：<input type="text" name="b_name"></label><br>
        <label>本のURL：<input type="text" name="b_url"></label><br>
        <label>本の一言コメント：<textArea name="b_cm" rows="4" cols="40"></textArea></label><br>

        <input type="submit" value="送信">
        </fieldset>
    </div>
</form>
</body>
</html>