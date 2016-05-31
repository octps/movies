<?

  require_once(dirname(__FILE__) . "/./Model.php");
  
  class Model_User extends Model {
    public static function get($name) {
      $dbh = \Db::getInstance();

      $sql = "SELECT * FROM users where name = :name";
      $dbh->beginTransaction();
      $sth = $dbh->prepare($sql);
      $sth->bindValue(':name', $name);
      $sth->execute();
      $dbh->commit();
      $user = $sth->fetchObject();

      $contents = [];
      $sql = "SELECT * FROM contents where user_id = :user_id ORDER BY created_at DESC;";
      $dbh->beginTransaction();
      $sth = $dbh->prepare($sql);
      $sth->bindValue(':user_id', $user->id);
      $sth->execute();
      $dbh->commit();
      while($content = $sth->fetchObject()) {
          $contents[] = $content;
      }

      return $contents;
    }

    public static function post($name, $content) {
      $dbh = \Db::getInstance();

      $sql = "SELECT * FROM users where name = :name";
      $dbh->beginTransaction();
      $sth = $dbh->prepare($sql);
      $sth->bindValue(':name', $name);
      $sth->execute();
      $dbh->commit();
      $user = $sth->fetchObject();

      $sql = "INSERT into contents (user_id, content, created_at) values (:user_id, :content, null);";
      $dbh->beginTransaction();
      $sth = $dbh->prepare($sql);
      $sth->bindValue(':user_id', $user->id);
      $sth->bindValue(':content', $content);
      $sth->execute();
      $dbh->commit();

      header('location:/');
    }

  }

