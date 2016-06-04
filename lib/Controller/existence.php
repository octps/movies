<?

$user = ['me'=>true,'you'=>true];

$url = $_SERVER["REQUEST_URI"];
$access = ltrim($url, '/');

if (isset($user[$access])) {
  require_once(dirname(__FILE__) . "/../Template/User.php");
  return;
}

require_once(dirname(__FILE__) . "/../Template/404.php");
