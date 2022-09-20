<?php
  $conn = mysqli_connect('localhost', 'root', '337575');
  mysqli_select_db($conn, 'opentutorials');
  $result = mysqli_query($conn, 'SELECT * FROM topic');

  // var_dump($row);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>JavaScript</title>
    <link rel="stylesheet" href="style.css" type="text/css">
  </head>
  <body id="target">
      <header>
        <h1><a href="http://localhost:8080/index.php">JavaScript</a></h1>
      </header>
      <nav>
        <ol>
          <?php
          while($row = mysqli_fetch_assoc($result)) {
            echo '<li><a href = "http://localhost:8080/index.php?id='.$row['id'].' ">'.htmlspecialchars($row['title']).'</a></li>'."\n";
          }
           ?>
        </ol>
      </nav>

      <div id="control">
        <input type="button" value="white" onclick="document.getElementById('target').className='white'"/>
        <input type="button" value="black" onclick="document.getElementById('target').className='black'"/>
        <a href="http://localhost:8080/write.php">write</a>
      </div>

      <article>
        <?php
          if(empty($_GET['id']) === false){
            $sql = 'SELECT * FROM topic WHERE id = '.$_GET['id'];
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            echo '<h2>'.htmlspecialchars($row['title']).'</h2>';
            echo '<p>'.htmlspecialchars($row['name'].'</p>');
            echo strip_tags($row['description'], '<a><h1><h2><h3><h4><h5><ul><ol><li>');
          }
        ?>
      </article>
  </body>
</html>
