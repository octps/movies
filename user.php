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
<footer>
  <a href="/logout">logout</a>
</footer>
</body>
</html>

