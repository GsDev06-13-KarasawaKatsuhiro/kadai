<?php
//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
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
      

    //tableで表示するバージョン
    $view .= '<tr>';
//    $view .= '<td>';
//    $view .= '<a class="link" href="a_delete.php?id='.$res["id"].'">';
//    $view .= 'del';
//    $view .= '</a>';
//    $view .= '</td>';
      
    $view .= '<td>';
    $view .= '<a class="bkn">';
    $view .= $res["name"];
    $view .= "</a>";
    $view .= '</td>';
      
    $view .= '<td>'.$res["issuedate"].'</td>';
    $view .= '<td>'.$res["indate"].'</td>';
    $view .= '<td>'.$res["pprice"].'</td>';
    $view .= '<td>'.$res["kprice"].'</td>';
    $view .= '<td>'.$res["currentprice"].'</td>';
//    $view .= '<td class="link">'.$res["url"].'</td>';
    $view .= '<td><a class="link" href="'.$res["url"].'"  >move</a></td>';
    $view .= '<td class="comment">'.$res["comment"].'</td>';
    $view .= '</tr>';
      
  }

}
?>





<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="../css/a_range_select.css">
<link rel="stylesheet" href="../css/a_reset.css">
<!--<link rel="stylesheet" href="css/main.css" />-->
<!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
<style>div{padding: 10px;font-size:16px;}</style>
<title>書籍情報表示（visitor）</title>
</head>
<body>

<header>
  <nav class="navbar navbar-default">
        <div class="container-fluid container-login">
  
<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<form class="login-form" name="form1" action="login_act.php" method="post">
ID:<input class="loginp" type="text" name="lid" />
　PW:<input class="loginp" type="password" name="lpw" />　
<input class="logbtn" type="submit" value="ログイン" />
</form>
      </div>
  </nav>
</header>
<!-- Main[Start] -->
<div class="back">
    <div class="container jumbotron">
        <table class="table">
           <tr><th class="name">書籍名</th><th class="date">発行日</th><th class="date">登録日</th><th class="date">定価</th><th class="date">kindle価格</th><th class="date">中古価格</th><th class="link">Link</th><th class="com">コメント</th></tr>
            <?= $view?>
        </table>
    </div>
</div>
<!-- Main[End] -->



</body>
</html>