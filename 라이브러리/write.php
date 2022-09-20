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
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  </head>

  <body id="target">
    <div class="container">
      <header class="jumbotron text-center">
        <img src="https://s3.ap-northeast-2.amazonaws.com/opentutorials-user-file/course/94.png" class="img-circle" alt="생활코딩" id="logo">
        <h1><a href="http://localhost:8080/index.php">JavaScript</a></h1>
      </header>

      <div class="row">
        <nav class="col-md-3">
          <ol class="nav nav-pills nav-stacked">
            <?php
            while($row = mysqli_fetch_assoc($result)) {
              echo '<li><a href = "http://localhost:8080/index.php?id='.$row['id'].' ">'.htmlspecialchars($row['title']).'</a></li>'."\n";
            }
             ?>
          </ol>
        </nav>

        <div class="col-md-9">

          <article>
            <form action="process.php" method="post">

              <div class="form-group">
                <label for="form-title">Title</label>
                <input type="text" name="title" class="form-control" id="form-title" placeholder="title">

                <label for="form-author">Author</label>
                <input type="text" name="author" class="form-control" id="form-author" placeholder="author">

                <label for="form-description">Description</label>
                <textarea class="form-control" name="description" id="form-description" placeholder="Write Description" rows="10"></textarea>
              </div>
              <!-- submit button -->
              <input type="submit" name="name" class="btn btn-default btn-lg" value="submit">
            </form>
          </article>
          <hr>
          <div id="control">
            <div class="btn-group" role="group" aria-label="...">
              <input type="button" class="btn btn-default btn-lg" value="white" onclick="document.getElementById('target').className='white'"/>
              <input type="button" class="btn btn-default btn-lg" value="black" onclick="document.getElementById('target').className='black'"/>
            </div>

            <a href="http://localhost:8080/write.php" class="btn btn-success btn-lg">write</a>
          </div>
        </div>

      </div>
    </div>

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
