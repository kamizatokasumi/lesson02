<?php
//DB接続情報を設定します。
$pdo = new PDO('mysql:host=localhost;dbname=sample', 'root', 'root');

//ここで「DB接続NG」だった場合、接続情報に誤りがあります。
/*
if ($pdo) {
  echo "DB接続OK";
} else {
  echo "DB接続NG";
}
*/

//SQLを実行。
$regis = $pdo->prepare("SELECT * FROM sample1");
$regis->execute();

//ここで「登録失敗」だった場合、SQL文に誤りがあります。

/*if ($regis) {
  echo "登録成功";
} else {
  echo "登録失敗";
} */
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>掲示板サンプル</title>
  <h1>掲示板サンプル</h1>
</head>

<section>
  <h2>新規投稿</h2>
  <form action="send.php" method="post">
    タイトル : <input type="text" name="title" value=""><br>
    カテゴリ: <select name="category" value="">
      <option>仕事</option>
      <option>生活</option>
      <option>趣味</option>
    </select><br>
    詳細: <input type="text" name="description" value=""><br>
    <button type="submit" name="submitButton">投稿</button>
  </form>
</section>

</html>

<section>
  <h2>投稿内容一覧</h2>
  <?php foreach ($regis as $loop) : ?>
    <div>No:<?php echo $loop['id'] ?></div>
    <div>タイトル:<?php echo $loop['title'] ?></div>
    <div>カテゴリ:<?php echo $loop['category'] ?></div>
    <div>詳細:<?php echo $loop['description'] ?></div>
    <div>投稿時間：<?php echo $loop['created_at'] ?><div>
        <div>[<a href="delete.php?id=<?php echo $loop['id'] ?>">削除</a>]<div>
            <div>------------------------------------------</div>
          <?php endforeach; ?>
</section>