<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン画面</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href="select.php">ログイン</a></div>
        </div>
    </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="login_act.php">
    <div class="jumbotron">
        <fieldset>
        <legend>本のデータ登録</legend>
        <label>ID：<input type="text" name="lid"></label><br>
        <label>PassWord：<input type="text" name="lpw"></label><br>
        <input type="submit" value="ログイン">
        </fieldset>
    </div>
</form>
<!-- Main[End] -->

</body>
</html>