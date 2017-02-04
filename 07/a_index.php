<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
<!--  <link href="css/bootstrap.min.css" rel="stylesheet">-->
 <link rel="stylesheet" href="css/a_range_index.css">
<link rel="stylesheet" href="css/a_reset.css">
  <style>div{padding: 10px;font-size:10px;}</style>
</head>
<body>

    <!-- Head[Start] -->
    <header>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
          <a class="navbar-brand" href="a_index.php">データ登録</a>
          <a class="navbar-brand" href="a_select.php">データ一覧</a>
          </div>
        </div>
      </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div class="back">
        <form method="post" action="a_insert.php">
          <div class="jumbotron">
           <fieldset>
            <legend>書籍情報登録フォーム</legend>
             <label><span class="spa">書籍名　　：</span><input type="text" name="name"></label><br>
             <label><span class="spa">発売日　　：</span><input type="text" name="issuedate"></label><br>
             <label><span class="spa">定価　　　：</span><input type="text" name="pprice"></label><br>
             <label><span class="spa">kindle価格：</span><input type="text" name="kprice"></label><br>
             <label><span class="spa">中古価格　：</span><input type="text" name="currentprice"></label><br>
             <label><span class="spa">書籍URL　：</span><input type="text" name="url"></label><br>
             <label><span class="spa">コメント　：</span><textArea name="comment" rows="4" cols="40"></textArea></label><br>
             <input class="submit" type="submit" value="送信">
            </fieldset>
          </div>
        </form>
    </div>
    <!-- Main[End] -->


</body>
</html>
