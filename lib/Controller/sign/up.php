<?
  require_once(dirname(__FILE__) . "/.././common.php");
  require_once(dirname(__FILE__) . "/../../Model/Sign/Up.php");
  
  $post = (object)$_POST;

  $sign = false;
  //varidate
  if (isset($post->name)
    && isset($post->email)
    && isset($post->password)
    && $post->name !== ''
    && filter_var(h($post->email), FILTER_VALIDATE_EMAIL)
    && $post->password !== ''
    && preg_match("/^[a-zA-Z0-9]+$/", $post->name)) {
      $sign = Sign::up(h($post->name), h($post->email), h($post->password));
  }
  else {
    header('location:/sign');
  }

  if ($sign !== false) {
    header('location:/sign/notice');
  }

