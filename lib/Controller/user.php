<?

  // require_once(dirname(__FILE__) . "/./common.php");
  require_once(dirname(__FILE__) . "/./sessionCheck.php");
  require_once(dirname(__FILE__) . "/../Model/User.php");
  require_once(dirname(__FILE__) . "/../Model/Follower.php");
 
  class user {
    public static function get($user, $session) {
      $items = [];
      $items['contents'] = Model_User::get($user->id);
      $items['followers'] = Model_follower::get($user->id);
      if (isset($session->loginUser) && $session->loginUser === $user->name) {
      	$items['session_state'] = 100;
      } elseif (isset($session->loginUser)) {
      	$items['session_state'] = 50;
      } elseif (!isset($session->loginUser)) {
      	$items['session_state'] = 0;
      }
      print_r($items['session_state']);

      return (object)$items;
    }

    public static function post($userId, $post, $session) {
      $post = Model_User::post($userId, $post);

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
    $items = user::get($user, $session);
  } else if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($post->method)) {
    user::post($session->userId, $post, $session);
  } else if ($_SERVER['REQUEST_METHOD'] === 'POST' && $post->method === "DELETE") {
    user::delete($post->id, $session);
  }


