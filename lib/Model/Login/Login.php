<?
  require_once(dirname(__FILE__) . "/../Model.php");

  class Login extends Model {
    public static function in($email, $password) {
      $dbh = \Db::getInstance();
      $sql = "SELECT * FROM users where email = :email And password = :password And auth > 0";
      $dbh->beginTransaction();
      $sth = $dbh->prepare($sql);
      $sth->bindValue(':email', $email);
      $sth->bindValue(':password', sha1($password));
      $sth->execute();
      $dbh->commit();
      $user = $sth->fetchObject();
      return $user;
    }
        
  }