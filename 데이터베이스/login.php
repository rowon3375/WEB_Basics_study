<?php
    $conn = mysqli_connect("localhost", "root", 337575);
    mysqli_select_db($conn, "opentutorials");
    $name = mysqli_real_escape_string($conn, $_GET['name']);
    $password = mysqli_real_escape_string($conn, $_GET['password']);
    $sql = "SELECT * FROM user WHERE name='".$name."' AND password='".$password."'";
    // echo $sql;
    $result = mysqli_query($conn, $sql);
?>
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
      if($result->num_rows == "0"){
        echo "로그인 실패";
      } else{
        echo "로그인 성공";
      }
     ?>
  </body>
</html>
