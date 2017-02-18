<?php
//必ずsession_startは最初に記述
session_start();

//現在のセッションIDを取得
$old_sessionid = session_id();
//新しいセッションIDを発行（前のSESSION IDは無効）
session_regenerate_id();
//新しいセッションIDを取得
$new_sessionid = session_id();

//ユーザー名表示
$user_name = "";
$user_name .= $_SESSION["name"];


//ログインしていない訪問者をはじく,管理フラグによって表示内容を変える
$menu = "";
if(
    $_SESSION["kanri_flg"] ==""
){
    header("Location: login/login.php");
    exit();
}elseif(
    $_SESSION["kanri_flg"] =="1"
){
    $menu .='<div class="navbar-header">';
    $menu .='<a class="navbar-brand" href="user_mgt/a_user_index.php">';
    $menu .='ユーザー登録';
    $menu .='</a>';
    $menu .='<a class="navbar-brand" href="user_mgt/a_user_select.php">';
    $menu .='ユーザー一覧';
    $menu .='</a>';
    $menu .='</div>';
}

//0.外部ファイル読み込み
include("functions.php");

?>




<?php
$id = $_GET["id"];

//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=:id");
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
  <title>書籍データ更新</title>
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
         <div class="header-menu">
          <div class="navbar-header">
          <a class="navbar-brand" href="a_index.php">データ登録</a>
          <a class="navbar-brand" href="a_select.php">データ一覧</a>
          </div>
          <?= $menu?>
        </div>
        
        <div class="container-user">
          <p>User name：<?= $user_name?></p>
          <a class="logout" href="login/logout.php">ログアウト</a>
        </div>
        
        </div>
        
      </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div class="back">
        <form method="post" action="a_update.php">
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
                    <label><input type="text" name="name" value="<?=$res["name"]?>"></label><br>
                    <label><input type="text" name="issuedate" value="<?=$res["issuedate"]?>"></label><br>
                    <label><input type="text" name="pprice" value="<?=$res["pprice"]?>"></label><br>
                    <label><input type="text" name="kprice" value="<?=$res["kprice"]?>"></label><br>
                    <label><input type="text" name="currentprice" value="<?=$res["currentprice"]?>"></label><br>
                    <label><input type="text" name="url" value="<?=$res["url"]?>"></label><br>
                    <label><textArea name="comment" rows="14" cols="40"><?=$res["comment"]?></textArea></label><br>
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
