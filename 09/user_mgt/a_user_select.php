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
    $menu .='<a class="navbar-brand" href="a_user_index.php">';
    $menu .='ユーザー登録';
    $menu .='</a>';
    $menu .='<a class="navbar-brand" href="a_user_select.php">';
    $menu .='ユーザー一覧';
    $menu .='</a>';
    $menu .='</div>';
}

//0.外部ファイル読み込み
include("../functions.php");

?>


<?php
//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
    

  //Selectデータの数だけ自動でループしてくれる
  while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
//    $view .= '<p>'.$res["name"]."**".$res["indate"].'</p>';
      
$life="";
if($res["life_flg"]==0){
    $life = "利用中";
}else{
    $life = "休止中";
}
      
$kanri="";
if($res["kanri_flg"]==0){
    $kanri = "一般";
}else{
    $kanri = "管理者";
}
      
      
    //tableで表示するバージョン
    $view .= '<tr>';
    $view .= '<td>';
    $view .= '<a class="link" href="a_user_delete.php?id='.$res["id"].'">';
    $view .= 'del';
    $view .= '</a>';
    $view .= '</td>';
      
    $view .= '<td>';
    $view .= '<a class="link" href="a_user_detail.php?id='.$res["id"].'">';
    $view .= $res["name"];
    $view .= "</a>";
    $view .= '</td>';
      
    $view .= '<td>'.$res["lid"].'</td>';
    $view .= '<td>'.$res["lpw"].'</td>';
//    $view .= '<td>'.$res["kanri_flg"].'</td>';
    $view .= '<td>'.$kanri.'</td>';
//    $view .= '<td>'.$res["life_flg"].'</td>';
    $view .= '<td>'.$life.'</td>';

    $view .= '</tr>';
      
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ユーザー情報表示</title>
<link rel="stylesheet" href="a_range_user_select.css">
<link rel="stylesheet" href="../css/a_reset.css">
<!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
<style>div{padding: 10px;font-size:10px;}</style>

</head>
<body id="main">

<!-- Head[Start] -->
    <header>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
         <div class="header-menu">
          <div class="navbar-header">
          <a class="navbar-brand" href="../a_index.php">データ登録</a>
          <a class="navbar-brand" href="../a_select.php">データ一覧</a>
          </div>
          <?= $menu?>
        </div>
         
        <div class="container-user">
          <p>User name：<?= $user_name?></p>
          <a class="logout" href="../login/logout.php">ログアウト</a>
        </div>
        </div>
      </nav>
    </header>
<!-- Head[End] -->

<!--<a href=""></a>-->

<!-- Main[Start] -->
<div class="back">
    <div class="container jumbotron">
        <table class="table">
           <tr><th class="num">削除</th><th class="name">氏名</th><th class="lid">ID</th><th class="lpw">Password</th><th class="kanri_flg">権限</th><th class="life_flg">稼働状況</th></tr>
            <?= $view?>
        </table>
    </div>
</div>
<!-- Main[End] -->

</body>
</html>
