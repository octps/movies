<?
  require_once(dirname(__FILE__) . "/../../Controller/user/id.php");
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
<a href="/<?= $user->name ?>">home</a>
</header>
<?= $user->name ?>
<div class="contents">
	<div class="contet">
		<div class="datetime">
			<?= $items->contents->created_at ?>
		</div>
		<div class="text">
			<?= $items->contents->content ?>
		</div>
      <form action="/user" method="post">
	    <input type="hidden" name="method" value="DELETE">
    	<input type="hidden" name="id" value="<?= $items->contents->id ?>">
        <input type="submit" value="削除">
      </form>
	</div>
</div>
<footer>
<a href="/logout">logout</a>
</footer>
</body>
</html>


