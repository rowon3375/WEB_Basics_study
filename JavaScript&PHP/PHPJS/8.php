<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>반목문</title>
  </head>

  <body>
    <h1>Javascript</h1>
    <ul>
      <script type="text/javascript">
        i = 0;
        while(i < 10){
          // document.write("hello<br />");
          document.write("<li>hello</li>");
          i = i + 1;
        }
      </script>
    </ul>

    <h1>PHP</h1>
    <ul>
      <?php
        $i = 0;
        while ($i < 10) {
          // echo "world<br />";
          echo "<li>world</li>";
          $i = $i + 1;
        }
       ?>
    </ul>

  </body>
</html>
