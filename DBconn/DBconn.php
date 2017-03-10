<!--<?php include ("config/session.php"); ?>-->

<?php/*
  require("config/config.php");
  require("lib/db.php");
  $conn=db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
  $result = mysqli_query($conn,'select * from topic');*/
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 위 3개의 메타 태그는 *반드시* head 태그의 처음에 와야합니다; 어떤 다른 콘텐츠들은 반드시 이 태그들 *다음에* 와야 합니다 -->
    <title>DBconn!!@</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/master.css">
  </head>
  <body>
    <h1>로그인완료!!</h1>
    <br />
    <article>
      <form action="process.php" method="post">

      <div class="form-group">
        <label for="form-title">제목</label>
        <input type="text" class="form-control" name="title" id="form-title" placeholder="제목을 입력하세요">
      </div>

      <div class="form-group">
        <label for="form-author">작성자</label>
        <input type="text" class="form-control" name="author" id="form-author" placeholder="작성자를 입력하세요">
      </div>

      <div class="form-group">
        <label for="form-">본문</label>
        <textarea class="form-control" rows=10 name="description" id="form-description" placeholder="본문을 입력하세요"></textarea>
      </div>

        <input type="submit" name="name" class="btn btn-default btn-lg">
      </form>
    </article>

    <!-- jQuery (부트스트랩의 자바스크립트 플러그인을 위해 필요합니다) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- 모든 컴파일된 플러그인을 포함합니다 (아래), 원하지 않는다면 필요한 각각의 파일을 포함하세요 -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
