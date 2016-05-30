<?

  require_once(dirname(__FILE__) . "/./common.php");
  require_once(dirname(__FILE__) . "/./sessionCheck.php");
  require_once(dirname(__FILE__) . "/../Model/User.php");
 
  class user {
    public static function get($name) {
      return Model_User::get($name);
    }

    public static function post() {
      print_r("post");
    }
  }

  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $contents = user::get($session->loginUser);
  } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    user::post();
  };

