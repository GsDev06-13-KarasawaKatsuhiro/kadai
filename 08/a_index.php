<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>書籍データ登録</title>
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
          
          <div class="navbar-header">
          <a class="navbar-brand" href="user_mgt/a_user_index.php">ユーザー登録</a>
          <a class="navbar-brand" href="user_mgt/a_user_select.php">ユーザー一覧</a>
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
             
            <div class="form-box">
                <div class="form-left">
                    <p>書籍名</p>
                    <p>発売日</p>
                    <p>定価</p>
                    <p>kindle価格</p>
                    <p>中古価格</p>
                    <p>書籍URL</p>
                    <p>コメント</p>
                </div>

                <div class="form-right">
                    <label><input type="text" name="name"></label><br>
                    <label><input type="text" name="issuedate"></label><br>
                    <label><input type="text" name="pprice"></label><br>
                    <label><input type="text" name="kprice"></label><br>
                    <label><input type="text" name="currentprice"></label><br>
                    <label><input type="text" name="url"></label><br>
                    <label><textArea name="comment" rows="14" cols="40"></textArea></label><br>
                </div>

            </div>
            
             <input class="submit" type="submit" value="送信">
            </fieldset>
          </div>
        </form>
    </div>
<!--     Main[End] -->


</body>
</html>
