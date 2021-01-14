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
        <div class="navbar-header"><a class="navbar-brand" href="select.php">BOOKデータ一覧の表示はここ</a></div>
        </div>
    </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
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
<!-- Main[End] -->

</body>
</html>