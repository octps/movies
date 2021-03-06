<?
  require_once(dirname(__FILE__) . "/../Model.php");

  class Auth extends Model {
    public static function check($name, $onetime_password) {
      $dbh = \Db::getInstance();
      // onetimepassの確認
      $sql = "SELECT * FROM users where name = :name AND onetime_password = :onetime_password";
      $dbh->beginTransaction();
      $sth = $dbh->prepare($sql);
      $sth->bindValue(':name', $name);
      $sth->bindValue(':onetime_password', $onetime_password);
      $sth->execute();
      $dbh->commit();
      $user = $sth->fetchObject();
      if ($user === false) {
        header('location:/sign/auth');
        return false;
      }

      $sql = "UPDATE users set auth = 2 WHERE name = :name";
      $dbh->beginTransaction();
      $sth = $dbh->prepare($sql);
      $sth->bindValue(':name', $name);
      $sth->execute();
      $dbh->commit();

      return $name;
    }
        
  }