<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <table border="1">
            <thead>
                <tr>
                    <th>姓名</th>
                    <th>年龄</th>
                    <th>住址</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $host="127.0.0.1";
                $db_user="root";
                $db_pass="root";
                $db_name="php2102";
                $mysql=new mysqli($host,$db_user,$db_pass,$db_name);

                $sql="select * from user_w";
                $sel=mysqli_query($mysql,$sql);
                $get_sel=mysqli_fetch_all($sel,MYSQLI_ASSOC);
                echo "<pre>";
                print_r($get_sel);
                echo "</pre>";

                foreach ($get_sel as $k => $v) {
                    if($v['age']>=18){
                        $v['age']="成年";
                    }else{
                        $v['age']="未成年";
                    }
                    echo "<tr><td>{$v['username']}</td><td>{$v['age']}</td><td>{$v['home']}</td></tr>";
                }
                ?>
            </tbody>
        </table>

    </body>
</html>
<?php
    