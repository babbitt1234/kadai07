<?php

//1.DB接続 
try {
  $pdo = new PDO('mysql:dbname=gs_db30;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//2.データ登録SQL
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table ORDER BY id DESC");
//SQL実行
$status = $stmt->execute();

//3.データ表示
$view = "";
if($status==false){
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //selectデータの数だけ自動でループしてくれる
  while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
      
//      $view .= $result["indate"]."　".$result["name"]."　".$result["url"]."　".$result["coment"]."　".$result["upfile"];
      
//      $view .= '<p>';
//      $view .='<a href="u_view.php?id='.$result["id"].'">';
//      $view .= $result["indate"]."　".$result["name"]."　".$result["url"]."　".$result["coment"];
//      $view .='</a>';
//      $view .='　';
//      $view .='<a href="delete.php?id='.$result["id"].'">';
//      $view .='[削除]';
//      $view .='</a>';
//      $view .= '</p>';
      
      $view .="<tr>";
      $view .="<td>";
      $view .=$result["indate"];
//      $view .='<a href="u_view.php?id='.$result["id"].'">'.$result["indate"].'</a>';
      $view .="</td>";
      $view .="<td>";
      $view .='<a href="u_view.php?id='.$result["id"].'">'.$result["name"].'</a>';
//      $view .=$result["name"];
      $view .="</td>";
      $view .="<td>";
      $view .=$result["url"];
      $view .="</td>";
      $view .="<td>";
      $view .=$result["coment"];
      $view .="</td>";
      $view .="</a>";
      $view .='<td>';
      $view .='<a href="delete.php?id='.$result["id"].'">'.'[削除]'.'</a>';
      $view .="</td>";
      $view .="</tr>";

  }
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>書籍のアーカイブ</title>
<link href="css/select.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<header>
  <nav>
    <div class="container-fluid">
      <div class="tittle">書籍のアーカイブ</div>
    </div>
  </nav>
</header>

<!--
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>
-->

<p class="list">登録一覧</p>
<table>
<tr>
<th>時間</th>
<th>書籍の名前</th>
<th>書籍のURL</th>
<th>読んだ感想•コメント</th>
<th>削除</th>
</tr>
<?=$view?>
</table>

<div>※タイトル（書籍の名前）をクリックすると内容を変更できます</div>
<div><a class="navbar-brand" href="index.php">登録画面に戻る</a></div>

</body>
</html>
