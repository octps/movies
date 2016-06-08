<?  
  if (!isset($_COOKIE["PHPSESSID"])){
      header("Location: /logout");
  } else {
    session_start();
    $session = (object)$_SESSION;
  }
