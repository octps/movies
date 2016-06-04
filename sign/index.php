<?
  $get = (object)$_GET;
?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="./css/common.css" media="all" />
<script src="./js/jquery-2.1.4.js"></script>
<script src="./js/movie.js"></script>
</head>
<body>
<h1>movie</h1>
<div>
  <h2>sign up</h2>
  <?= @$get->error === 'mail_duplicate' ? 'メールアドレスの重複' :'' ?>
  <?= @$get->error === 'name_duplicate' ? '名前の重複' :'' ?>
  <form action="/sign/up" method="post">
    <div>
    <label>
      name : <input type="text" name="name" value="">
    </label>
    （nameは英数のみ）
    </div>
    <label>
      E-mail : <input type="email" name="email" value="">
    </label>
    <label>
      password : <input type="password" name="password" value="">
    </label>
    <input type="submit" value="signup">
  </form>
</div>
</body>
</html>

