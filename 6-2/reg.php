<?php

    session_start();
    //判断用户是否已经登录
    if (!empty($_SESSION)) {
        if (array_key_exists($_SESSION['id'], $_COOKIE)) {
            echo "已登录，退出登录后，可在注册页面注册，正在转跳个人中心......";
            header("Refresh:2;url=../5-31/5-31_work/Personal_session.php");
            die();
        }
    }
    if (empty($_POST)==false){

        //判断注册信息不能有空内容
        if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['mobile']) || empty($_POST['pass'])) {

            echo "注册失败，信息不能有空";
            header("Refresh : 1; reg.php");
            die();

        }
        include "../6-1/base.php";
        $user = trim($_POST['username']);
        $email = trim($_POST['email']);
        $mobile = trim($_POST['mobile']);
        $pass = trim($_POST['pass']);
        //    echo "<pre>";
        //    print_r($_POST);
        //    echo "</pre>";

        //去数据库判断用户是否已存在 找到用户说明用户已存在
        $sql_con = "select * from users where  username='{$user}'  || email = '{$email}' || mobile='{$mobile}'";
        $query = mysqli_query($mysql, $sql_con);
        $fe = mysqli_fetch_all($query, MYSQLI_ASSOC);



        if ($fe) {
            header("Refresh:2;reg.php");
            die("用户已存在，请重新注册");
        }
        //将密码转换为哈希值
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        //获取当前时间戳并转为时间
        $time = date('Y-m-d H-i-s', time());


        $sql = "insert into users (username,email,mobile,pass,reg_time) values ('{$user}','{$email}','{$mobile}','{$pass}','{$time}')";

        $stmt = mysqli_prepare($mysql, $sql);

        $res = mysqli_stmt_execute($stmt);

        if ($res) {
            echo "注册成功,这是您的注册信息<br>";
            echo "账号：" . $user . "<br>";
            echo "邮箱：" . $email . "<br>";
            echo "手机号：" . $mobile . "<br>";
            echo "密码：" . $user . "<br>";
            echo "<a href='Sign.php'>去登录</a>";
            //header("Refresh:1;login.html");
        } else {
            echo "注册失败" . mysqli_connect_error();
        }
        die();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
</head>
<body>
<h1>注册</h1>
<form action="reg.php" method="post">
    <input type="text" name="username" placeholder="用户名"><br>
    <input type="text" name="email" placeholder="email"><br>
    <input type="text" name="mobile" placeholder="手机号"><br>
    <input type="password" name="pass"  placeholder="密码"><br>
    <input type="password" name="passT"  placeholder="确认密码"><br>
    <input type="submit" name="" value="注册提交">
<!--    <select>-->
<!--        <option value="3">444</option>-->
<!--        <option value="6">555</option>-->
<!--    </select>-->
    <a href="Sign.php">已有账号，点此登录</a>
</form>
</body>
</html>
<script>

    let pass=document.getElementsByName('pass')[0];
    let passT=document.getElementsByName('passT')[0];
    let form=document.getElementsByTagName('form')[0];
    // console.log(form);
    // console.log(pass);
    // console.log(passT);
    form.onsubmit=function () {
        if (pass.value!==passT.value){
        console.log(11);
        return false
        }
        return true
    }
</script>
