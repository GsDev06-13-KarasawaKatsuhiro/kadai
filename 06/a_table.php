<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <title>アンケート結果表示（表）</title>
</head>
<body>
    <table border="1">
        <tr><th>氏名</th><th>性別</th><th>年齢</th><th>職業</th><th>住所</th><th>mail</th><th>サイトを知った方法</th></tr>
        
        <?php

        if( ($fp = fopen("data/data.csv","r"))=== false ){
            die("CSVファイル読み込みエラー");
        }

        while (($array = fgetcsv($fp)) !== FALSE) {

            //空行を取り除く
            if(!array_diff($array, array(''))){
                continue;
            }

            echo "<tr>";
            for($i = 0; $i < count($array); ++$i ){
                $elem = nl2br(mb_convert_encoding($array[$i], 'UTF-8', 'SJIS'));
                $elem = $elem === "" ?  "&nbsp;" : $elem;
                echo("<td>".$elem."</td>");
            }
            echo "</tr>";

        }

        fclose($fp);
    ?>
        
    </table>
    
<ul>
<li><a href="a_index.php">indexへ</a></li>
</ul>
    
</body>
</html>