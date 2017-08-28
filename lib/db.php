<?php
  //중복제거를 위한 db_init 함수 설정 - $conn에 값을 return
  function db_init($host, $dbuser, $dbpwd, $dbname){
    $conn=mysqli_connect($host, $dbuser, $dbpwd);
    mysqli_select_db($conn, $dbname);
    return $conn;
  }
?>
