<!--<?php session_start(); ?>-->
<?php
        header("Content-Type: text/html; charset=UTF-8");

        require("../config/config.php");
        require("../lib/db.php");
        $conn=db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
      //        session_start();   //세션의 시작
        $uid = $_POST['uid'];    // uid, 로그인창에서 입력한 아이디 값 받기
        $upw = $_POST['upw'];  // upwd, 로그인창에서 입력한 비밀번호 값 받기

        $sql = "select * from RAIZ_test.user where user_name = '$uid' and user_password = '$upw'";   //DB에서 아이디값과 비밀번호가 동일한
        $result = mysqli_query($conn,$sql) or die(mysql_error());                                    //데이터를 찾아서
        $count=mysqli_num_rows($result);                                                                    //몇개의 데이터가 반환되었는지 확인

    if ($count==1){    //만약 1개의 데이터를 반환하였다면
        //session_register("uid");   //uid라는 세션을 등록
        //$_SESSION['uid']=$uid;   // DBconn.php 페이지로 이동
          header('Location: ../DBconn.php');
        } else {                 //그렇지 않다면 경고창을 띄우고 로그인페이지로 이동
            echo '<script type = "text/javascript">alert("아이디나 패스워드를 잘못입력하셨습니다.")</script> ';
            header('Location: ../login.php');
        }


?>
