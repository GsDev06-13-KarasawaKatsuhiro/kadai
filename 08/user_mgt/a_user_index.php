<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザー登録</title>
<!--  <link href="css/bootstrap.min.css" rel="stylesheet">-->
<link rel="stylesheet" href="a_range_user_index.css">
<link rel="stylesheet" href="../css/a_reset.css">
  <style>div{padding: 10px;font-size:10px;}</style>
</head>
<body>

    <!-- Head[Start] -->
    <header>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
          <a class="navbar-brand" href="../a_index.php">データ登録</a>
          <a class="navbar-brand" href="../a_select.php">データ一覧</a>
          </div>
         
          <div class="navbar-header">
          <a class="navbar-brand" href="a_user_index.php">ユーザー登録</a>
          <a class="navbar-brand" href="a_user_select.php">ユーザー一覧</a>
          </div>
        </div>
      </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div class="back">
        <form method="post" action="a_user_insert.php">
          <div class="jumbotron">
           <fieldset>
            <legend>ユーザー登録フォーム</legend>
             
            <div class="form-box">
                <div class="form-left">
                    <p>氏名</p>
                    <p>ID</p>
                    <p>Password</p>
                    <p>権限</p>
                    <p>稼働状況</p>
                </div>

                <div class="form-right">
<label><input type="text" name="name"></label><br>
<label><input type="text" name="lid"></label><br>
<label><input type="text" name="lpw"></label><br>
<label>
<input class="radio" type="radio" name="kanri_flg" value="0">一般　
<input class="radio" type="radio" name="kanri_flg" value="1">管理者　
</label><br>
<label>
<input class="radio" type="radio" name="life_flg" value="0">利用中　
<input class="radio" type="radio" name="life_flg" value="1">休止中　
</label><br>
                </div>

            </div>
            
             <input class="submit" type="submit" value="送信">
            </fieldset>
          </div>

        </form>
    </div>
    <!-- Main[End] -->


</body>
</html>
