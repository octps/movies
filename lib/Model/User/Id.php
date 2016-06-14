<?

  require_once(dirname(__FILE__) . "/../Model.php");
  
  class Model_User_Id extends Model {
    public static function get($id) {
      $dbh = \Db::getInstance();
      // todo try catch
      // 例外を投げる
      $sql = "SELECT * FROM contents where id = :id AND delete_flag = 0";
      $dbh->beginTransaction();
      $sth = $dbh->prepare($sql);
      $sth->bindValue(':id', $id);
      $sth->execute();
      $dbh->commit();
      $content = $sth->fetchObject();
      return $content;
    }

  }

