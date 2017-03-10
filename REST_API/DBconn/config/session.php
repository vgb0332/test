<?php
    session_start();

    require("config/config.php");
    require("lib/db.php");
    $conn=db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);

    $user_check=$_SESSION['uid'];    //세션 uid를 받아서
    $ses_sql=mysqli_query($con, "select user_name RAIZ_test.user where user_name='$user_check' ");
    $row=mysqli_fetch_array($ses_sql);
    $login_session=$row['id'];  // 넘어온 값이 db에 있는 지 확인 후

    if(!isset($login_session))  // 값이 비었다면 Login 페이지로 이동시킵니다. Session.php를 각 페이지에 include 시킴으로써 세션 구현
    {
        echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
    }


?>
