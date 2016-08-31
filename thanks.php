<?php
  $nickname = htmlspecialchars($_POST['nickname'] . '様');
  $email = htmlspecialchars($_POST['email']);
  $content = htmlspecialchars($_POST['content']);

 //①DBへ接続
  $dsn = 'mysql:dbname=phpkiso;host=localhost';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh ->query('SET NAMES utf8');

  //②SDL文を実行
  $sql = 'INSERT INTO `survey`(`nickname`, `email`, `content`) VALUES ("'.$nickname.'","'.$email.'","'.$content.'")';
  // SQLを実行
  $stmt = $dbh->prepare($sql);
  $stmt->execute();

   //③DB切断
  $dbh = null;

    ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <title>送信完了</title>
  <meta charset="utf-8">
</head>
<body>
    <h1>お問い合わせありがとうございました！</h1>
    <p>ニックネーム:<?php echo $nickname; ?></p>
    <p>メールアドレス:<?php echo $email; ?></p>
    <p>お問い合わせ内容:<?php echo $content; ?></p>
</body>
</html>