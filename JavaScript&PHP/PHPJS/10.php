<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Array+반목문</title>
  </head>

  <body>
    <h1>Javascript</h1>
    <ul>
      <script type="text/javascript">
        list = new Array("one", "two", "three");
        i = 0;
        while (i < list.length) {
          document.write("<li>"+list[i]+"</li>")
          i = i + 1;
        }
      </script>
    </ul>

    <h1>PHP</h1>
    <ul>
      <?php
        $list = array("1", "2", "3");

        $i = 0;
        while ($i < count($list)) {
          echo "<li>".$list[$i]."</li>";
          $i = $i + 1;
        }
       ?>
    </ul>


  </body>
</html>
