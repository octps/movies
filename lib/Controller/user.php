<?

  require_once(dirname(__FILE__) . "/./common.php");
  require_once(dirname(__FILE__) . "/./sessionCheck.php");
  require_once(dirname(__FILE__) . "/../Model/User.php");
 
  class user {
    public static function get($id) {
      return Model_User::get($id);
    }

    public static function post($id, $content) {
      Model_User::post($id, $content);
    }
  }

  $post = (object)$_POST;

  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $contents = user::get($session->userId);
  } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    user::post($session->userId, h($post->content));
  }


