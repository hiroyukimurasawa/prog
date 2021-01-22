<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー登録</title>
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
<form method="POST" action="user_insert.php">
    <div class="jumbotron">
        <fieldset>
        <legend>ユーザー新規登録</legend>
        <label>ユーザー名：<input type="text" name="u_name"></label><br>
        <label>ユーザーID：<input type="text" name="u_id"></label><br>
        <label>ユーザーPW：<input type="text" name="u_pw"></label><br>
        <input type="hidden" name="life_flg" value="1"></label><br>
        <input type="hidden" name="kanri_flg" value="1"></label><br>

        <input type="submit" value="送信">
        </fieldset>
    </div>
</form>
<!-- Main[End] -->

</body>
</html>