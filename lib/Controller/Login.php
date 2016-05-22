<?
  require_once(dirname(__FILE__) . "/./common.php");
  require_once(dirname(__FILE__) . "/../Model/Login/Login.php");
  
  $post = (object)$_POST;

  //varidate
  if (isset($post->email)
    && isset($post->password)
    && $post->password !== ''
    && filter_var(h($post->email), FILTER_VALIDATE_EMAIL)) {
      $user = Login::in($post->email, h($post->password));
      if ($user !== false) {
        session_start();
        $_SESSION["loginUser"] = $user->name;
        header("Location: /user");
        return;
      }
      header("Location: /?error");
      return;
  }

  header("Location: /?error");


