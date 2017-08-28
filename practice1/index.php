<?php
  require_once('conn.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css" media="screen" charset="utf-8">
  </head>
  <body id="body">
    <header>
      <h1><a href="index.php">MOMO CODING</a></h1>
    </header>
    <nav>
      <ol>
        <?php
          $conn=mysqli_connect("localhost", "root", "4097");
          mysqli_select_db($conn, "momo2");
          $sql = "SELECT * FROM `topic`";
          $result=mysqli_query($conn, $sql);
          while($row=mysqli_fetch_assoc($result)){
            echo '<li><a href="index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>';
          }
        ?>
      </ol>
    </nav>
    <div id="content">
      <article>
        <?php
          if(empty($_GET['id'])){
            echo "WELCOME";
          } else {
          $id=mysqli_real_escape_string($conn, $_GET['id']);
          $sql="SELECT topic.id, topic.title, topic.description, user.name, topic.created FROM topic LEFT JOIN user ON topic.author = user.id WHERE topic.id=".$id;
          $result=mysqli_query($conn, $sql);
          $row=mysqli_fetch_assoc($result);
        ?>
          <h2><?=htmlspecialchars($row['title'])?></h2>
          <div><?=$row['created']?> | <?=htmlspecialchars($row['name'])?> </div>
          <div><?=htmlspecialchars($row['description'])?></div>
        <?php
        }
        ?>
      </article>
      <input type="button" name="name" value="white" onclick="document.getElementById('body').className=''">
      <input type="button" name="name" value="black" onclick="document.getElementById('body').className='black'">
      <a href="Write.php">Write</a>
    </div>
  </body>
</html>
