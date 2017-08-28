<?php
  require("config/config.php");
  require("lib/db.php");
  $conn=db_init($config["host"], $config["dbuser"], $config["dbpwd"], $config["dbname"]);
  $sql="SELECT * FROM user WHERE name='".$_POST['author']."'";
  $result=mysqli_query($conn, $sql);
  echo $result->num_rows;
  if($result->num_rows == 0){
    $sql="INSERT INTO user (name, password) VALUES('".$_POST['author']."','777777')";
    mysqli_query($conn, $sql);
    $user_id=mysqli_insert_id($conn);
  } else {
    $row=mysqli_fetch_assoc($result);
    $user_id=$row['id'];
  }

  $sql = "INSERT INTO momo (title,description,author,created) VALUES('".$_POST['title']."', '".$_POST['description']."', '".$user_id."', now())";
  $result=mysqli_query($conn, $sql);
  header('Location: /index.php');
 ?>
