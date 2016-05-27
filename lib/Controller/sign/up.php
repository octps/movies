<?
  require_once(dirname(__FILE__) . "/.././common.php");
  require_once(dirname(__FILE__) . "/../../Model/Sign/Up.php");
  
  $post = (object)$_POST;

  //varidate
  if (isset($post->name)
    && isset($post->email)
    && isset($post->password)
    && $post->name !== ''
    && filter_var(h($post->email), FILTER_VALIDATE_EMAIL)
    && $post->password !== '') {
      Sign::up($post->name, h($post->email), h($post->password));
  }

  header('location:/sign/notice');