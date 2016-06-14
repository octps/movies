<?

  require_once(dirname(__FILE__) . "/./Model.php");
  
  class Model_Existence extends Model {
    public static function user($name) {
      $dbh = \Db::getInstance();
      // todo try catch
      // 例外を投げる
      $sql = "SELECT * FROM users WHERE name = :name";
      $dbh->beginTransaction();
      $sth = $dbh->prepare($sql);
      $sth->bindValue(':name', $name);
      $sth->execute();
      $dbh->commit();
      $user = $sth->fetchObject();
      
      return $user;
    }

  }

