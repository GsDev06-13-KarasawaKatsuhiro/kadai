<?php
include("funcs.php");//外部ファイルの参照設定
?>

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
    $view .= '<td>'.$res["id"].'</td>';
    $view .= '<td>'.$res["name"].'</td>';
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
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>書籍情報表示</title>
<link rel="stylesheet" href="css/a_range_select.css">
<link rel="stylesheet" href="css/a_reset.css">
<!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
<style>div{padding: 10px;font-size:10px;}</style>

</head>
<body id="main">
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

<!--<a href=""></a>-->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron">
        <table class="table">
           <tr><th class="num">ID</th><th class="name">書籍名</th><th class="date">発行日</th><th class="date">登録日</th><th class="date">定価</th><th class="date">kindle価格</th><th class="date">中古価格</th><th class="link">Link</th><th class="com">コメント</th></tr>
            <?= $view?>
        </table>
    </div>
</div>
<!-- Main[End] -->

</body>
</html>
