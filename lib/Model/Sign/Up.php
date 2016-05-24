<?
  require_once(dirname(__FILE__) . "/../Model.php");

  class Sign extends Model {
    public static function up($name, $email, $password) {
      $dbh = \Db::getInstance();
      $sql = "INSERT INTO users (name, email, password, created_at) values(:name, :email, :password, null)";
      $dbh->beginTransaction();
      $sth = $dbh->prepare($sql);
      $sth->bindValue(':name', $name);
      $sth->bindValue(':email', $email);
      $sth->bindValue(':password', sha1($password));
      $sth->execute();
      $dbh->commit();

      $to = $email;
      $from = "From:toshinweb@gmail.com";
      $subject = '東伸企画テスト';
      $bodyTextData = "テスト";

      mb_language('Japanese');
      mb_internal_encoding("UTF-8");
      mb_send_mail($to, $subject, $bodyTextData, $from);

      // insert 完了
      // mail送信 完了
      // insert user宛にメール送信 完了
      // メールには認証用リンクを設定
      // メールにはone time passwordが記載されている
      // リンク先に飛び、one time passwordを入力することで認証完了

      /* ##todo
        * メール送信
        * 認証用リンク
        * onetime pass
        * db変更
          * 認証済みか未認証か
          * onetime pass
            * sha1?
          * n日以内の処理
            * n日以上で、dbから削除
            
      // return $user;
      */
    }
        
  }