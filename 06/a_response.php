<?php
include("funcs.php");//外部ファイルの参照設定
$name = $_POST["name"];
$address = $_POST["address"];
$mail = $_POST["mail"];
$sex = $_POST["sex"];
$age = $_POST["age"];
$job = $_POST["job"];
$know = $_POST["know"];



?>

<html>
<head>
<meta charset="utf-8">
<title>POST練習（受信）</title>
</head>

<body>
お名前：<?php echo h($name) ?><br>
性別：<?php echo h($sex) ?><br>
年齢：<?php echo h($age) ?><br>
職業：<?php echo h($job) ?><br>
ご住所：<?php echo h($address) ?><br>
E-Mail：<?php echo h($mail) ?><br>
このサイトを知った方法：<?php echo h($know) ?><br>

<?php
    $answer = "$name, $sex, $age, $job, $address, $mail, $know";
    $str = explode("," , $answer);


//$str = $name.",".$mail."\r\n";
//    date("Y-m-d H:i:s")."文字列";
$file = fopen("data/data.csv","a+");	// ファイル読み込み
flock($file, LOCK_EX);			// 一度に多人数がアクセスできないようにファイルロック
fwrite($file, mb_convert_encoding($answer."\r\n", 'SJIS', 'UTF-8'));//"\r\n"は改行
flock($file, LOCK_UN);			// ファイルロック解除
fclose($file);
?>






<ul>
<li><a href="a_index.php">indexへ</a></li>
</ul>
</body>
</html>