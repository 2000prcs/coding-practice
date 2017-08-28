<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MOMO's Home</title>
  </head>
  <body>
    <?php
      echo file_get_contents($_GET['id'].".txt");
     ?>
   </body>
</html>
