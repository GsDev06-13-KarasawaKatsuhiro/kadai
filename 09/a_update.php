<?php
//1. POSTデータ取得
$id           = $_POST["id"];
$name         = $_POST["name"];
$url          = $_POST["url"];
$comment      = $_POST["comment"];
$issuedate    = $_POST["issuedate"];
$pprice       = $_POST["pprice"];
$kprice       = $_POST["kprice"];
$currentprice = $_POST["currentprice"];


//2. DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE gs_bm_table SET name=:name,url=:url,comment=:comment,pprice=:pprice,currentprice=:currentprice,issuedate=:issuedate,kprice=:kprice WHERE id=:id");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':pprice', $pprice, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':currentprice', $currentprice, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':issuedate', $issuedate, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kprice', $kprice, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id);
$status = $stmt->execute();


//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）見て意味が分かるエラーはerror[2]だけなので、基本以下のコードはコピーして使う
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト headerの後には必ずexitを書く習わし
  header("Location: a_select.php");
  exit;

}
?>
