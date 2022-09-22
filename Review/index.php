<!-- 데이터베이스 연결 -->
<?php
  $conn = mysqli_connect("localhost", "root", "337575");
  mysqli_select_db($conn, 'opentutorials2');
  // mysqli_query: mysql에다가 실제로 정보를 조회, 수정, 삭제 할 때 사용함.
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
            <?php
            if(empty($_GET['id'])){
              echo "hi";
            } else{
              // mysqli_fetch_assoc: php가 사용할 수 있도록 가공해 주는 함수
              // var_dump(): 데이터 값을 정확하게 설명해준다.
              // null =  false 이다.
                $id = mysqli_real_escape_string($conn, $_GET['id']);
              //mysqli_real_escape_string: 외부로부터 들어오는 정보는 중요해서 데이터 베이스에 저장 전에 이걸로 저장한다.
                $sql = "select topic.id, topic.title, topic.description, user.name,
                topic.created from topic left join user on topic.author = user.id
                where topic.id=".$id;
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                ?>
                <h2><?= htmlspecialchars($row['title']); ?></h2>
                <div><?= htmlspecialchars($row['created']) ?> | <?= htmlspecialchars($row['name']) ?></div>
                <div><?= htmlspecialchars($row['description']) ?></div>
            <?php } ?>
        </article>

        <!-- 버튼 -->
        <input type="button" name="name" value="White" onclick="white()">
        <input type="button" name="name" value="Black" onclick="black()">
        <a href="write.php">Write</a>

      </div>

  </body>
</html>
