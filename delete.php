<?php

try {
  $pdo = new PDO('mysql:host=localhost;dbname=sample', 'root', 'root');
  /*
  if ($pdo) {
    echo "DB接続OK";
  } else {
    echo "DB接続NG";
  }
*/
  $regis = $pdo->prepare('DELETE FROM sample1 WHERE id = :id');
  $regis->execute(array(':id' => $_GET["id"]));

  echo "削除しました。";
} catch (Exception $e) {
  echo 'エラーが発生しました。:' . $e->getMessage();
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>削除完了</title>
</head>

<body>
  <p>
    <a href="index.php">投稿一覧へ</a>
  </p>
</body>

</html>