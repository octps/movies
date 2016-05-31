<?

  require_once(dirname(__FILE__) . "/./Model.php");
  
  class Model_User extends Model {
    public static function get($id) {
      $dbh = \Db::getInstance();

      $contents = [];
      $sql = "SELECT * FROM contents where user_id = :user_id ORDER BY created_at DESC;";
      $dbh->beginTransaction();
      $sth = $dbh->prepare($sql);
      $sth->bindValue(':user_id', $id);
      $sth->execute();
      $dbh->commit();
      while($content = $sth->fetchObject()) {
          $contents[] = $content;
      }

      return $contents;
    }

    public static function post($id, $content) {
      $dbh = \Db::getInstance();

      $sql = "INSERT into contents (user_id, content, created_at) values (:user_id, :content, null);";
      $dbh->beginTransaction();
      $sth = $dbh->prepare($sql);
      $sth->bindValue(':user_id', $id);
      $sth->bindValue(':content', $content);
      $sth->execute();
      $dbh->commit();

      header('location:/');
    }

  }

