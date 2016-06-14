<?  
  if (!isset($_COOKIE["PHPSESSID"])){
  	$session_flag = false;
      // header("Location: /logout");
  } else {
    session_start();
    $session = (object)$_SESSION;
  }
