<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
</head>
<body>

      <p>비밀번호를 입력해주세요.</p>
      <input type="text" name="password">
      <input type="submit">
      <?php
      $password = $_GET["password"];
      if($password == "1111"){
          echo "주인님 환영합니다";
      } else {
          echo "뉘신지?";
      }
      ?>

</body>
</html>
