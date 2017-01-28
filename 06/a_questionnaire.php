<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title></title>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<link rel="stylesheet" href="css/a_appearance.css">
<link rel="stylesheet" href="css/reset.css">
<!--<link rel="stylesheet" href="/star/min/jquery.rateyo.min.css"/>-->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
</head>
<body>
<div class="container">

<div class="wrapper">

<div class="q-wrapper">

<div class="question">
<div class="form-left">
    <div class="item one"><p>お名前</p></div>
    <div class="item two"><p>性別</p></div>
    <div class="item three"><p>年齢</p></div>
    <div class="item four"><p>職業</p></div>
    <div class="item five"><p>ご住所</p></div>
    <div class="item six"><p>E-mail</p></div>
    <div class="item seven"><p>どうやってこのサイトを知りましたか？</p></div>
</div>


<div class="form-right">
<form action="a_response.php" method="POST">
        <div>
    <!--        <p>お名前</p>-->
            <input class="text" type="text" name="name">
        </div>

        <div>
    <!--        <p>性別</p>-->
            <p><input type="radio" name="sex" value="男性">男性<br>
            <input type="radio" name="sex" value="女性">女性</p>
        </div>

        <div>
    <!--        <p>年齢</p>-->
            <p><input type="radio" name="age" value="-19歳">～19歳<br>
            <input type="radio" name="age" value="20-24歳">20～24歳<br>
            <input type="radio" name="age" value="25-29歳">25～29歳<br>
            <input type="radio" name="age" value="30-39歳">30～39歳<br>
            <input type="radio" name="age" value="40-49歳">40～49歳<br>
            <input type="radio" name="age" value="50-59歳">50～59歳<br>
            <input type="radio" name="age" value="60歳-">60歳～</p>
        </div>

        <div>
    <!--        <p>職業</p>-->
            <p><input type="radio" name="job" value="公務員">公務員<br>
            <input type="radio" name="job" value="経営者・自営業">経営者・自営業<br>
            <input type="radio" name="job" value="会社員（正規）">会社員（正規）<br>
            <input type="radio" name="job" value="会社員（非正規）">会社員（非正規）<br>
            <input type="radio" name="job" value="専業主婦（主夫）">専業主婦（主夫）<br>
            <input type="radio" name="job" value="学生">学生<br>
            <input type="radio" name="job" value="その他">その他</p>
        </div>

        <div>
    <!--        <p>ご住所</p>-->
            <input class="text" type="text" name="address">
        </div>

        <div>
    <!--        <p>E-mail</p>-->
            <input class="text" type="text" name="mail">
        </div>

        <div>
    <!--        <p>どうやってこのサイトを知りましたか？</p>-->
            <p><input type="checkbox" name="know" value="TV">TV<br>
            <input type="checkbox" name="know" value="新聞">新聞<br>
            <input type="checkbox" name="know" value="検索エンジン">検索エンジン<br>
            <input type="checkbox" name="know" value="ネット広告">ネット広告<br>
            <input type="checkbox" name="know" value="SNS・ブログ">SNS・ブログ<br>
            <input type="checkbox" name="know" value="家族・友人・知人">家族・友人・知人<br>
            <input type="checkbox" name="know" value="その他">その他</p>
        </div>
</form>
</div>
</div>
<!--
    <tr>
        <td>コンテンツの量は十分でしたか？</td>
        <td id="star"></td>
    </tr>
    
    <tr>
        <td>コンテンツの質は良かったですか？</td>
        <td id="star"></td>
    </tr>
-->
    <div class="sub-box">
    <input class="submit" type="submit">
    </div>


</div>

<div class="link">
<ul>
<li><a href="a_index.php">indexへ</a></li>
</ul>
</div>

</div>
</div>


<!--
<ul>
<li><a href="get.php">form(get)</a></li>
<li><a href="post.php">form(post)</a></li>
<li><a href="hensu.php">変数</a></li>
<li><a href="hairetsu.php">配列</a></li>
<li><a href="kansu.php">関数</a></li>
<li><a href="phpinfo.php">PHP設定情報</a></li>
</ul>
<ul>
<li><a href="write.php">ファイル書き込み</a></li>
<li><a href="read.php">ファイル読み込む</a></li>
</ul>
-->


</body>




<!--//アマゾン風星評価-->
<!-- jQuery本体 -->
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
<!-- rete yo本体 -->
<!--<script type="text/javascript" src="/star/src/jquery.rateyo.js"></script>-->

<!--
<script>
$(function () {
    // 星の大きさ変更＆クリックイベント取得
    $("#star").rateYo({
        starWidth: "20px",
        })
        .on("rateyo.set", function (e, data) {
            alert("The rating is set to " + data.rating + "!");
        }
    );
    // 色変更
    $("#rateYo2").rateYo({
        ratedFill: "#E74C3C"
    });
    // 星の数を変更
    $("#rateYo3").rateYo({
        numStars: 10
    });
});
</script>
-->
</html>