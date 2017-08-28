<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MOMO's Home</title>
  </head>
  <body>
    <?php
      $password = $_GET["password"];
      if($password == "1111"){
        echo "Welcome to MOMO's Home";
      } else {
        echo "Who the hell are you?";
      }
    ?>
  </body>
</html>
