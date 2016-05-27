<?
  
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
  <h2>auth</h2>
  <form action="/sign/auth" method="post">
    <label>
      name : <input type="text" name="name" value="">
    </label>
    <label>
      one time password : <input type="password" name="onetime_password" value="">
    </label>
    <input type="submit" value="go">
  </form>
</div>
</body>
</html>

