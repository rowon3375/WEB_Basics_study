<?php
  // echo $_POST['title'];
  $conn = mysqli_connect('localhost', 'root', '337575');
  mysqli_select_db($conn, 'opentutorials');
  $sql = "INSERT INTO topic (title,description,author,created)
   VALUES('".$_POST['title']."','".$_POST['description']."','".$_POST['author']."',now())";
  $result = mysqli_query($conn, $sql);
  header('Location: http://localhost:8080/index.php');
?>
