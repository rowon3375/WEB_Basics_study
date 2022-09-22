<!-- 데이터베이스 연결 -->
<?php
  $conn = mysqli_connect("localhost", "root", "337575");
  mysqli_select_db($conn, 'opentutorials2');
  // mysql에다가 실제로 정보를 조회, 수정, 삭제 할 때 사용함.
  $sql = "SELECT * FROM `topic`";
  $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Review</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <script type="text/javascript">
      function black(){
        document.getElementById('body').className="black";
      }
      function white(){
        document.getElementById('body').className="";
      }

    </script>
  </head>


  <body id="body">
    <!-- 헤더 -->
    <header>
      <a href="index.php"><h1>WEB Basic</h1></a>
    </header>

    <!-- 네비게이션 -->
    <nav>
      <ol>
        <?php
          while($row = mysqli_fetch_assoc($result)) {
            echo '<li><a href = "http://localhost:8080/index.php?id='.
            $row['id'].' ">'.htmlspecialchars($row['title']).'</a></li>'."\n";
          }
        ?>
      </ol>
    </nav>

    <!-- 본문 -->
    <div class="content">
        <article>
          <form class="" action="process.php" method="post">
              <p>
                <label for="title">Title: </label>
                <input type="text" name="title">
              </p>
              <p>
                <label for="author">Author: </label>
                <input type="text" name="author">
              </p>
              <p>
                <label for="description">Content: </label>
                <textarea name="description" rows="8" cols="40"></textarea>
              </p>
              <p>
              <input type="submit" name="name" value="submit">
              </p>
          </form>
        </article>

        <!-- 버튼 -->
        <input type="button" name="name" value="White" onclick="white()">
        <input type="button" name="name" value="Black" onclick="black()">
        <a href="write.php">Write</a>

      </div>

  </body>
</html>
