<?php
    
//1. POST受信
$name = $_POST["name"];
$url = $_POST["url"];
$coment = $_POST["coment"];

//2.DB接続（エラー処理追加）
try {
  $pdo = new PDO('mysql:dbname=gs_db30;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//3．SQLを作って実行
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, name, url, coment,
indate)
VALUES(NULL, :name, :url, :coment, sysdate())");

//$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, name, url, coment, indate, upfile)
//VALUES(NULL, :name, :url, :coment, sysdate(), :upfile)");

//データを渡す
$stmt->bindValue(':name', $name,   PDO::PARAM_STR);
$stmt->bindValue(':url', $url,  PDO::PARAM_STR);
$stmt->bindValue(':coment', $coment, PDO::PARAM_STR);

//$stmt->bindParam(':upfile', file_get_contents($_FILES['upfile'], PDO::PARAM_STR));

//SQL実行
$status = $stmt->execute();

//4.データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  //2に読める英語が入る
  exit("QueryError:".$error[2]);
}else{
//5.index.phpへリダイレクト
  header("Location: index.php");
  exit;
}
?>
