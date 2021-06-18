<?php
    // 将表单数据写入数据库
    $name = trim($_POST['uname']);
    $age = intval($_POST['age']);
    $address = trim($_POST['address']);

    $host = "127.0.0.1";
    $db_user = "root";
    $db_pass = "root";
    $db_name = "php2102";

    $link = new mysqli($host,$db_user,$db_pass,$db_name);

    $sql = "insert into user1 (`username`,`age`,`address`) 
values ('{$name}',{$age},'{$address}')";

    // 准备阶段
    $stmt = mysqli_prepare($link,$sql);

    //执行
    mysqli_stmt_execute($stmt);



    //获取数据库中的 记录
    $sql = "select * from user1";

    $result = mysqli_query($link,$sql);
    $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);

    echo "<hr/><pre>";
    print_r($rows);
    echo "</pre>";
?>

<table border="1">
    <thead>
        <tr>
            <th>姓名</th><th>年龄</th><th>地址</th>
        </tr>      2
    </thead>
    <tbody>
        <?php
            foreach($rows as $k=>$v){
                if($v['age']>=28){
                    $a = "成年";
                }else{
                    $a = "未成年";
                }
                echo "<tr>";
                echo "<td> {$v['username']} </td>";
                echo "<td> {$a} </td>";
                echo "<td> {$v['address']} </td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>


