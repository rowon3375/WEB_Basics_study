<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <!-- &lt;a&gt; href="http://opentutorials.org/course/1">생활코딩</a> -->
    <?php
        echo htmlspecialchars
        ('<a href="http://opentutorials.org/course/1">codingeverybody</a>');
        echo "<br/>";
        echo htmlspecialchars('<script>alert(1):</script>');
     ?>
  </body>
</html>
