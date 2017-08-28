<?php
	$conn=mysqli_connect("localhost", "root", 4097);
	mysqli_select_db($conn, "momo");
  $name=mysqli_real_escape_string($conn, $_GET['name']);
  $password=mysqli_real_escape_string($conn, $_GET['password']);


  $sql="SELECT * FROM user WHERE name='".$name."' AND password='".$password."'";
  echo $sql;
	$result=mysqli_query($conn, $sql);
  //var_dump($result->num_rows);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MOMO's Home</title>
  </head>
  <body>
    <?php
      if($result->num_rows == "0"){
        echo "Who the hell are you?";
      } else {
        echo "Welcome to MOMO's Home";
      }
    ?>
  </body>
</html>
