<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>로그인기능_php</title>
  </head>

  <body>
    <h1>PHP</h1>
    <?php
      // echo $_GET['password'];
      $password = $_GET['password'];
      if($password == "1111"){
        echo "로그인 성공";
      } else{
        echo "로그인 실패";
      }
     ?>
  </body>
</html>
