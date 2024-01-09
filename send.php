<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>掲示板サンプル</title>
</head>
<h1>掲示板サンプル</h1>
<section>
  <h2>投稿完了</h2>
  <button onclick="location.href='index.php'">戻る</button>
</section>

<?php
$id = null;
$title = $_POST["title"];
$category = $_POST["category"];
$description = $_POST["description"];
date_default_timezone_set('Asia/Tokyo');
$created_at = date("Y-m-d H:i:s");

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
$regis = $pdo->prepare("INSERT INTO sample1(id, title, category, description,created_at) VALUES (:id,:title,:category,:description,:created_at)");
$regis->bindParam(":id", $id);
$regis->bindParam(":title", $title);
$regis->bindParam(":category", $category);
$regis->bindParam(":description", $description);
$regis->bindParam(":created_at", $created_at);
$regis->execute();

//ここで「登録失敗」だった場合、SQL文に誤りがあります。
/*
if ($regis) {
  echo "登録成功";
} else {
  echo "登録失敗";
}
?>
*/