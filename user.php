<?
  require_once(dirname(__FILE__) . "/./lib/Controller/user.php");
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
  <h2>user: <?= $session->loginUser; ?></h2>
</div>
<form action="/user" method="post">
	text : <input type="text" name="content" value="">
	<input type="submit" value="登録">
</form>
<div class="contents">
<? foreach ((array)$contents as $content): ?>
	<div class="contet">
		<div class="datetime">
			<?= $content->created_at ?>
		</div>
		<div class="text">
			<?= $content->content ?>
		</div>
      <form action="/user" method="post">
      <input type="hidden" name="method" value="DELETE">
      <input type="hidden" name="id" value="<?= $session->userId ?>">
      <input type="submit" value="削除">
    </form>
	</div>
<? endforeach; ?>
</div>
<footer>
  <a href="/logout">logout</a>
</footer>
</body>
</html>

