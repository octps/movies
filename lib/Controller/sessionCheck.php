<?  
  if (!isset($_COOKIE["PHPSESSID"])){
      header("Location: /");
  } else {
    session_start();
    $session = (object)$_SESSION;
  }
