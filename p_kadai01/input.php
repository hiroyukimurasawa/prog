<html>
<link rel="stylesheet" href="css.css">
<head>
<meta charset="utf-8">
<title>お正月アンケート</title>
</head>
<body>
<h1>お正月アンケート</h1>
<form action="write.php" method="post">
	お名前: <input type="text" name="name">
	EMAIL: <input type="text" name="mail">
<br>
<div class="wrapper">
問1. 年越しそばを
<select name="soba[]" size="3" multiple="multiple">
	<option value="そば食べた">食べた</option>
	<option value="うどん食べた">うどんを食べた</option>
	<option value="何も食べてない">何も食べてない</option>
	<option value="その他">その他</option>
</select>
<br>
</div>
<div class="wrapper">
問2. おせち料理を
<select name="oseti[]" size="3" multiple="multiple">
	<option value="おせち作った">作った</option>
	<option value="おせち買った">買った</option>
	<option value="おせち何もなし">何も用意してない</option>
	<option value="おせちその他">その他</option>
</select>
<br>
</div>
<div class="wrapper">
問3. おとしだまを
<select name="money[]" size="3" multiple="multiple">
	<option value="お年玉もらった">貰った</option>
	<option value="お年玉あげた">あげた</option>
	<option value="お年玉なし">何もなし</option>
	<option value="おとしだまその他">その他</option>
</select>
<br>
</div>
<div class="wrapper">
<input type="text" name="sdate" value="<?php echo date('Y/m/d H:i:s');?>"></br>
</div>
<div class="wrapper">
	<input type="submit" value="送信">
</div>
</form>
</body>
</html>