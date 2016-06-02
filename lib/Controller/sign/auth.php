<?
  require_once(dirname(__FILE__) . "/.././common.php");
  require_once(dirname(__FILE__) . "/../../Model/Sign/Auth.php");
  
  $post = (object)$_POST;
  $auth = false;
  //varidate
  if (isset($post->name)
    && isset($post->onetime_password)
    && $post->name !== ''
    && $post->onetime_password !== '') {
      $auth = Auth::check($post->name, h($post->onetime_password));
  }
  if ($auth !== false) {
    session_start();
    $session = (object)$_SESSION;
    $_SESSION["loginUser"] = $auth->name;
    $_SESSION["userId"] = $auth->id;
    header('location:/user');
    return;
  }

  header('location:/auth');
