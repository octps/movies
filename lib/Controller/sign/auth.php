<?
  require_once(dirname(__FILE__) . "/.././common.php");
  require_once(dirname(__FILE__) . "/../../Model/Sign/Auth.php");
  
  $post = (object)$_POST;
  //varidate
  if (isset($post->name)
    && isset($post->onetime_password)
    && $post->name !== ''
    && $post->onetime_password !== '') {
      $auth = Auth::check($post->name, h($post->onetime_password));
  }

  header('location:/');