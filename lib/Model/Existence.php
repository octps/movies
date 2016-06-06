<?

  require_once(dirname(__FILE__) . "/./Model.php");
  
  class Model_Existence extends Model {
    public static function user($userId) {
      $dbh = \Db::getInstance();
      // todo try catch
      // 例外を投げる
      $sql = "SELECT * FROM users WHERE id = :id";
      $dbh->beginTransaction();
      $sth = $dbh->prepare($sql);
      $sth->bindValue(':id', $userId);
      $sth->execute();
      $dbh->commit();
      $user = $sth->fetchObject();
      
      return $user;
    }

  }

