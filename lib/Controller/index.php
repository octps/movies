<?
  if (isset($_COOKIE["PHPSESSID"])){
    session_start();
    header('location: /user');
  }
  if (isset($_GET['error'])) {
    $error = true;
  }
