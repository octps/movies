<?

  require_once(dirname(__FILE__) . "/./Model.php");
  
  class Model_User extends Model {
    public static function get($userId) {
      $dbh = \Db::getInstance();
      // todo try catch
      // 例外を投げる
      $contents = [];
      $sql = "SELECT * FROM contents where user_id = :user_id AND delete_flag = 0 ORDER BY created_at DESC;";
      $dbh->beginTransaction();
      $sth = $dbh->prepare($sql);
      $sth->bindValue(':user_id', $userId);
      $sth->execute();
      $dbh->commit();
      while($content = $sth->fetchObject()) {
          $contents[] = $content;
      }

      return $contents;
    }

    public static function post($userId, $content) {
      $dbh = \Db::getInstance();
      // todo try catch
      // 例外を投げる
      $sql = "INSERT into contents (user_id, content, created_at) values (:user_id, :content, null);";
      $dbh->beginTransaction();
      $sth = $dbh->prepare($sql);
      $sth->bindValue(':user_id', $userId);
      $sth->bindValue(':content', $content);
      $sth->execute();
      $dbh->commit();

      return true;
    }

    public static function delete($id) {
      $dbh = \Db::getInstance();
      // todo try catch
      // 例外を投げる
      $sql = "UPDATE contents set delete_flag = 1 where id = :id;";
      $dbh->beginTransaction();
      $sth = $dbh->prepare($sql);
      $sth->bindValue(':id', $id);
      $sth->execute();
      $dbh->commit();

      return true;
    }

  }

