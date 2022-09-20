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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JavaScript</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
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
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://code.jquery.com/jquery-1.12.4.min.js"
      integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
      crossorigin="anonymous"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"
      integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd"
      crossorigin="anonymous"></script>
  </body>
</html>
