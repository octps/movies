CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTO_INCREMENT
  , name VARCHAR(64)  NOT NULL
  , email VARCHAR(64) NOT NULL
  , password VARCHAR(64) NOT NULL
  , auth int DEFAULT 0 /* 0は権限なし、1は全権限を持つ。以下、増えることに制限 */
  , onetime_password VARCHAR(64) NOT NULL
  , created_at TIMESTAMP NOT NULL DEFAULT 0
  , updated_at TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE NOW()
) ENGINE = InnoDB
DEFAULT CHARACTER SET 'utf8';
