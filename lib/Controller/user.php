<?

  // require_once(dirname(__FILE__) . "/./common.php");
  require_once(dirname(__FILE__) . "/./sessionCheck.php");
  require_once(dirname(__FILE__) . "/../Model/User.php");
  require_once(dirname(__FILE__) . "/../Model/Follower.php");
 
  class user {
    public static function get($userId) {
      $items = [];
      $items['contents'] = Model_User::get($userId);
      $items['followers'] = Model_follower::get($userId);
      return (object)$items;
    }

    public static function post($userId, $content,$session) {
      $post = Model_User::post($userId, $content);
      if ($post === true) {
        header("location: /$session->loginUser");
        return;
      }
      // todo modelでのtry catchを確認する
      echo "post error";
    }

    public static function delete($id, $session) {
      $delete = Model_User::delete($id); 
      if ($delete === true) {
        header("location:/$session->loginUser");
        return;        
      }
      // todo modelでのtry catchを確認する
      echo "delete error";
    }
  }

  $post = (object)$_POST;
  $session = @(object)$_SESSION;

  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $items = user::get($user->id);
  } else if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($post->method)) {
    user::post($session->userId, h($post->content), $session);
  } else if ($_SERVER['REQUEST_METHOD'] === 'POST' && $post->method === "DELETE") {
    user::delete($post->id, $session);
  }


