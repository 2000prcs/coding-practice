<?php
//데이터베이스 접속
  require_once('conn.php');
//저자가 user 테이블에 존재하는지 여부를 체크
// { } = ".." 따옴표 및 마침표 생략
  $author=mysqli_real_escape_string($conn, $_POST['author']);
  $sql="SELECT * FROM `user` WHERE `name` = '{$author}'";
  $result=mysqli_query($conn, $sql);
//존재한다면 user id를 알아낸다. id 가 존재할 경우 num_rows = int(1) / 존재하지 않으면 int(0) 으로 표시됨
  if($result->num_rows > 0){
  $row=mysqli_fetch_assoc($result);
  $user_id=$row['id'];
  } else {
//존재하지 않는다면 저자를 user 테이블에 추가 후 id를 알아낸다.
  $sql="INSERT INTO user (id, name) VALUES (NULL, '{$author}')";
  $result=mysqli_query($conn, $sql);
//mysqli_insert_id 함수는 이 직전에 실행된 mysqli_query 에 의해 추가된 행의 id 값을 리턴해줌
//Data 추가 후, 추가한 테이블의 id 값을 알아내고, 그 결과를 user_id 변수에 담음
  $user_id=mysqli_insert_id($conn);
  }
//제목, 저자, 본문 등을 topic 테이블에 추가
  $title=mysqli_real_escape_string($conn, $_POST['title']);
  $description=mysqli_real_escape_string($conn, $_POST['description']);
  $sql= "INSERT INTO `topic` (`id`, `title`, `description`, `author`, `created`)
  VALUES (NULL, '{$title}', '{$description}', '{$user_id}', now())";
  mysqli_query($conn, $sql);
//사용자를 index.php로 이동
  header('Location:index.php');
 ?>
