<!doctype html>
<html lang="zh-CN">
    <head>
        <meta charset="UTF-8">
        <title>查询</title>
    </head>
    <body>
        <table border="1">
            <tr>
                <th>学生姓名</th>
                <th>年龄</th>
                <th>住址</th>
            </tr>
            <?php
            $text_arr=explode("!",file_get_contents('add'));
            array_shift($text_arr);

            foreach ($text_arr as $k => $v) {
                $text_arr[$k] =explode(",",$v);
                if ($text_arr[$k][1]<18){
                    $text_arr[$k][1]='未成年';
                }
            }
            for ($i=0 ;$i<count($text_arr);$i++){
                echo "<tr><td>{$text_arr[$i][0]}</td><td>{$text_arr[$i][1]}</td><td>{$text_arr[$i][2]}</td></tr>";
            }
            ?>
        </table>
    </body>
</html>
    