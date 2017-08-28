<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MOMO's Home</title>
  </head>
  <body>
    <h1>JavaScript</h1>
    <ul>
    <script>
      list = new Array("Mo", "Eric", "Yanick", "Patrick");
      i=0;
      while(i<list.length){
        document.write("<li>"+list[i]+"</li>");
        i=i+1;
      }
    </script>
    </ul>
  </body>
    <h1>php</h1>
    <ul>
    <?php
      $list = array("Mo", "Eric", "Yanick", "Patrick");
      $i=0;
      while($i<count($list)){
        echo "<li>".$list[$i]."</li>";
        $i=$i+1;
      }
     ?>
   </ul>
</html>
