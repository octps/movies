<?

  // require_once(dirname(__FILE__) . "/./common.php");
  // require_once(dirname(__FILE__) . "/./sessionCheck.php");
  require_once(dirname(__FILE__) . "/../../Model/User/Id.php");
  require_once(dirname(__FILE__) . "/../../Model/Follower.php");
 
  class user_id {
    public static function get() {
      $uri = $_SERVER['REQUEST_URI'];
      $uriArray = explode('/', $uri);
      $items = [];
      $items['contents'] = Model_User_Id::get($uriArray[2]);
      // $items['followers'] = Model_follower::get($userId);
      return (object)$items;
    }
  }

  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $items = user_id::get();
    if ($items->contents === false) {
      header("location: /404");
    }
  }