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

      /*  
      ## mamp mail
      * http://origin8.info/blog/?p=211
      */

      $to = $email;
      $from = "From:toshinweb@gmail.com";
      $subject = '東伸企画テスト';
      $bodyTextData = 'go to <a href="http://localhost/auth">sign up</a>';

      mb_language('Japanese');
      mb_internal_encoding("UTF-8");
      mb_send_mail($to, $subject, $bodyTextData, $from);

      /* * insert 完了
         * mail送信 完了
         * insert user宛にメール送信 完了
         * siginupだけではログインできないようにする
           * alter table
             * authカラムの作成 // 済み
             * authで権限を司る。 // 済み
             * onetime passwordカラムの作成 // 済み
             * authが0の時はログインできない状態にする // 済み
             * メール送信時にurlを渡す
               * urlは固定。
               * onetime_passwordを生成
               * onetime_passwordをtableに保持
               * メールの内容に、onetime_passwordを記載
               * formは、ユーザー名とonetime password
               * postの値を確認して、authの値を変更する
           * メールアドレスは3日程度で削除する
              * 登録日（created_at）とauthを確認し、3日追加しているものは、trueとできなくする
              * 定期的にcronでsqlを実行、deleteする。（将来的に）

        * メールには認証用リンクを設定
        * メールにはone time passwordが記載されている
        * リンク先に飛び、one time passwordを入力することで認証完了
      */

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