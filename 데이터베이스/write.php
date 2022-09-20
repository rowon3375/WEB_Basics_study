<?php
  require("config/config.php");
  require("lib/db.php");
  $conn = db_init($config["host"], $config["duser"], $config["dpw"],
  $config["dname"]);
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
            echo '<li><a href = "http://localhost:8080/index.php?id='.$row['id'].' ">'.$row['title'].'</a></li>'."\n";
          }
           ?>
        </ol>
      </nav>

      <div id="control">
        <input type="button" value="white" onclick="document.getElementById('target').className='white'"/>
        <input type="button" value="black" onclick="document.getElementById('target').className='black'"/>
      </div>

      <article>
        <form action="process.php" method="post">
          <p>
            Title: <input type="text" name="title">
          </p>
          <p>
            Author: <input type="text" name="author">
          </p>
          <p>
            Content: <textarea name="description"></textarea>
          </p>
          <input type="submit" name="name">
        </form>
      </article>
  </body>
</html>
