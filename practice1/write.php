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
        <form class="" action="process.php" method="post">
          <p>
            <label for="title">Title:</label>
            <input id="title" type="text" name="title">
          </p>
          <p>
            <label for="author">Author:</label>
            <input id="author" type="text" name="author">
          </p>
          <p>
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="8" cols="40"></textarea>
          </p>
          <p>
            <input type="submit" value="Submit">
          </p>
        </form>
      </article>
      <input type="button" name="name" value="white" onclick="document.getElementById('body').className=''">
      <input type="button" name="name" value="black" onclick="document.getElementById('body').className='black'">
      <a href="Write.php">Write</a>
    </div>
  </body>
</html>
