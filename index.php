<?
  require_once(dirname(__FILE__) . "/./lib/Controller/index.php");
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
  <a href="/sign/" method="post">sign up</a>
  <!-- ニックネーム と email と password -->
  </form>
</div>
<div>
  <h2>log in</h2>
  <?= @$error ? "error" : '' ?>
  <form action="/login" method="post">
    <label>
      E-mail : <input type="email" name="email" value="">
    </label>
    <label>
      password : <input type="password" name="password" value="">
    </label>
    <input type="submit" value="login">
  </form>
</div>
</body>
</html>

