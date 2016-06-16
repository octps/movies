<?
  require_once(dirname(__FILE__) . "/../Controller/user.php");
?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="/css/common.css" media="all" />
<script src="/js/jquery-2.1.4.js"></script>
<script src="/js/movie.js"></script>
</head>
<body>
<header>
<h1>movie</h1>
<nav>
<a href="/<?= $user->name ?>">home</a>
<nav>
</header>
login user : <?= isset($session->loginUser) ? $session->loginUser : 'guest' ?><br />
this place : <?= $user->name ?>
<? if (isset($session->loginUser) && $session->loginUser === $user->name): ?>
<form action="/<?= $user->name ?>" method="post">
	text : <input type="text" name="content" value="">
	<input type="submit" value="登録">
</form>
<? endif; ?>
<div class="contents">
<? foreach ($items->contents as $content): ?>
	<div class="contet">
		<div class="datetime">
			<?= $content->created_at ?>
		</div>
		<div class="text">
			<?= $content->content ?>
		</div>
		<a href="/<?= $user->name ?>/<?= $content->id ?>">詳細</a>
	<? if (isset($session->loginUser) && $session->loginUser === $user->name): ?>
      <form action="/<?= $user->name ?>" method="post">
	    <input type="hidden" name="method" value="DELETE">
    	<input type="hidden" name="id" value="<?= $content->id ?>">
        <input type="submit" value="削除">
      </form>
	<? endif; ?>
	</div>
<? endforeach; ?>
</div>
<div class="follower">
<? foreach ($items->followers as $follower): ?>
  <p>follow: <?= $follower->name ?></p>
<? endforeach; ?>
</div>
<footer>
<? if (isset($session->loginUser)): ?>
<a href="/logout">logout</a>
<? endif; ?>
	<p>movie</p>
</footer>
</body>
</html>


