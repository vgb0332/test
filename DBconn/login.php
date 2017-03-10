
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 위 3개의 메타 태그는 *반드시* head 태그의 처음에 와야합니다; 어떤 다른 콘텐츠들은 반드시 이 태그들 *다음에* 와야 합니다 -->
    <title>DBconn!!@</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/master.css">
  </head>
  <body>
    <article>
      <form action="lib/loginMGR.php" method="post">

      <div class="form-group">
        <label for="form-uid">User_ID</label>
        <input type="text" class="form-control" name="uid" id="form-uid" placeholder="관리자 아이디를 입력하세요">
      </div>

      <div class="form-group">
        <label for="form-upw">User_PASSWORD</label>
        <input type="text" class="form-control" name="upw" id="form-upw" placeholder="비밀번호를 입력하세요">
      </div>

        <input type="submit" name="name" class="btn btn-default btn-lg" value="로그인">
      </form>
    </article>

    <!-- jQuery (부트스트랩의 자바스크립트 플러그인을 위해 필요합니다) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- 모든 컴파일된 플러그인을 포함합니다 (아래), 원하지 않는다면 필요한 각각의 파일을 포함하세요 -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
