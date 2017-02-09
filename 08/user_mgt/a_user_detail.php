<?php
$id = $_GET["id"];

//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
$stmt->bindvalue(":id",$id,PDO::PARAM_INT); //STR(文字列) or INT(数字)
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
    $res = $stmt->fetch(); //1レコード取得する書き方
  }

?>




<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザー情報更新</title>
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
        <form method="post" action="a_user_update.php">
          <div class="jumbotron">
           <fieldset>
            <legend>ユーザー更新フォーム</legend>
            
            <div class="form-box">
                <div class="form-left">
                    <p>氏名</p>
                    <p>ID</p>
                    <p>Password</p>
                    <p>権限</p>
                    <p>稼働状況</p>
                </div>

                <div class="form-right">
                    <label><input type="text" name="name" value="<?=$res["name"]?>"></label><br>
                    <label><input type="text" name="lid" value="<?=$res["lid"]?>"></label><br>
                    <label><input type="text" name="lpw" value="<?=$res["lpw"]?>"></label><br>
<label>
<?php
$kanri = $res["kanri_flg"];
              
$checked0 = ($kanri) ? "" : "checked";
$checked1 = ($kanri) ? "checked" : "";
              
echo <<< EOT
<input type="hidden" name="id" value="$id">
<input class="radio" type="radio" name="kanri_flg" value=0 $checked0 />一般　
<input class="radio" type="radio" name="kanri_flg" value=1 $checked1 />管理者　
EOT;
?>
</label><br>
<label>
<?php
$life = $res["life_flg"];

$checked0 = ($life) ? "" : "checked";
$checked1 = ($life) ? "checked" : "";

echo <<< EOT
<input type="hidden" name="id" value="$id">
<input class="radio" type="radio" name="life_flg" value=0 $checked0/>利用中　
<input class="radio" type="radio" name="life_flg" value=1 $checked1/>休止中　
EOT;
?>
</label><br>
                </div>
            </div>
            
            

             <input type="hidden" name="id" value="<?=$res["id"]?>">
             
             
             
             <input class="submit" type="submit" value="更新">
            </fieldset>
          </div>
        </form>
    </div>
    <!-- Main[End] -->


</body>
</html>
