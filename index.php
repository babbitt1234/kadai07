<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>書籍のアーカイブ</title>
<!--  <link href="css/bootstrap.min.css" rel="stylesheet">-->
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header">書籍のアーカイブ</div>
    </div>
  </nav>
</header>
<!-- Head[End] -->


<!-- Main[Start] -->
<form method="post" action="insert.php">

<!--<form method="post" action="insert.php" enctype="multipart/form-data">-->
 
  <div class="jumbotron">
   <fieldset>
    <legend>書籍の登録</legend>
     <label>書籍の名前：<input type="text" name="name"></label><br>
     <label>書籍のURL：<input type="text" name="url"></label><br>
     <label>読んだ感想•コメント：<textArea name="coment" rows="4" cols="40"></textArea></label><br>
<!--     <label>書籍画像：<input type="file" name="upfile" size="30"></label><br>-->
     <input type="submit" value="送信"><br>
    </fieldset>
    <div><a class="navbar-brand" href="select.php">登録一覧を見る</a></div>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
