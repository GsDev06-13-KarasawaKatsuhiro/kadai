<?php
session_start();
include("functions.php");
ssidCheck();

//1.GETでidを取得
$id = $_GET["id"];

//2.DB接続など
$pdo = db_con();

//3.SELECT * FROM gs_an_table WHERE id=***; を取得（bindValueを使用！）
$stmt = $pdo->prepare("SELECT * FROM gs_cms_table WHERE id=:id");
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
  queryError($stmt);
}else{
  $row = $stmt->fetch();
}



?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>POSTデータ登録</title>
  <script src="ckeditor/ckeditor.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<?php include("menu.php"); ?>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php" enctype="multipart/form-data">
  <div class="jumbotron">
   <fieldset>
    <legend>記事編集</legend>
     <label>Newsタイトル：<input type="text" name="title" value="<?=$row["title"]?>"></label><br>
     <textarea name="article" id="editor1" rows="10" cols="80">
          <?=$row["article"]?>
      </textarea>
        <script>
       CKEDITOR.replace('editor1');
       </script>
     登録済画像<img src="<?=$row["upfile"]?>" style="width:100px; height:80px">
     <input type="file" name="filename" >
     <input type="hidden" name="id" value="<?=$id?>">
          <input type="submit" value="送信">
     <div class="preview" />



    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
<script>
// documentと毎回書くのがだるいので$に置き換え
var $ = document; 
var $form = $.querySelector('form');// jQueryの $("form")相当

//jQueryの$(function() { 相当(ただし厳密には違う)
$.addEventListener('DOMContentLoaded', function() {
    //画像ファイルプレビュー表示
    //  jQueryの $('input[type="file"]')相当
    // addEventListenerは on("change", function(e){}) 相当
    $.querySelector('input[type="file"]').addEventListener('change', function(e) {
        var file = e.target.files[0],
               reader = new FileReader(),
               $preview =  $.querySelector(".preview"), // jQueryの $(".preview")相当
               t = this;
        
        // 画像ファイル以外の場合は何もしない
        if(file.type.indexOf("image") < 0){
          return false;
        }
        
        reader.onload = (function(file) {
          return function(e) {
             //jQueryの$preview.empty(); 相当
             while ($preview.firstChild) $preview.removeChild($preview.firstChild);

            // imgタグを作成
            var img = document.createElement( 'img' );
            img.setAttribute('src',  e.target.result);
            img.setAttribute('width', '150px');
            img.setAttribute('title',  file.name);
            // imgタグを$previeの中に追加
            $preview.appendChild(img);
          }; 
        })(file);
        
        reader.readAsDataURL(file);
    }); 
});

</script>
</html>






