<?php
    if (empty($_GET) || isset($_GET['id']) ==false){
        header("Refresh :1 ;url =pdo_page.php");
        die("请选择需要删除的商品");
    }

    $id=intval($_GET['id']);
    echo $id;
    $host='127.0.0.1';
    $dbname='php2102';
    $dbUser="root";
    $dbPass='root';
    $dbh=new  PDO("mysql:host=$host;dbname=$dbname",$dbUser,$dbPass);
    $sql="delete from p_goods where goods_id=?";

    $stmt=$dbh->prepare($sql);
    $stmt->bindParam(1,$id);
    $stmt->execute();
    $errCode=$stmt->errorCode();
    if ($errCode!="00000"){
        $errInfo=$stmt->errorInfo();
        echo $errInfo[2]."<br>";
        die("删除失败");
    }
    echo "删除成功";