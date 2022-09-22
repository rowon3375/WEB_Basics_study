<?php
  // print_r($_POST);
  // 순서
  // 1. 데이터베이스 접속
    $conn = mysqli_connect("localhost", "root", "337575");
    mysqli_select_db($conn, 'opentutorials2');

  // 2. 저자가 user 테이블에 존재하는지 여부 체크
  $author = mysqli_real_escape_string($conn, $_POST['author']);
  $sql = "SELECT * FROM `user` WHERE `name` = '{$author}'";
  $result = mysqli_query($conn, $sql);
      //var_dump($result-> num_rows);
  if($result -> num_rows > 0){
    // 사용자가 존재한다면---> 3. 존재한다면 해당 user의 id를 알아낸다.
    // $user_id는 $row의 정보 중, id 값만 사용한다.
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['id'];

  } else{
    // 사용자가 존재하지 않는다면 ---> 4. 존재하지 않는다면 저자를 user에 추가 후 id를 알아낸다.
    $sql = "insert into user (id, name) values (null, '{$author}')";
    $result = mysqli_query($conn, $sql);
    //id 값을 바탕으로 해서 author의 user id값을 부여한다.
    //mysqli_insert_id: 해당 함수가 실행되기 직전에 실행된 sql 쿼리의 결과의 행의 id값을 리턴함.
    $user_id = mysqli_insert_id($conn);
  }
    // 5. 사용자가 입력한 제목, 저자, 본문 등을 topic 테이블에 추가
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $sql = "INSERT INTO `topic` (`id`, `title`, `description`, `author`, `created`)
          VALUES (NULL, '{$title}' , '{$description}', '{$user_id}', now())";

  mysqli_query($conn, $sql);
  //등록이 왼료되면 해당 사이트로 다시 이동시킨다.
  header('Location: index.php');
?>
