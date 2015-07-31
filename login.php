<?php


    $bg = "images/bg".rand(1,6).".jpg";

    echo "<html style='background: url($bg) no-repeat center center fixed;
    -webkit-background-size: cover !important;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover !important;'>"
      echo "<head>";
      include_once('req_files.php');
      require('db_conn.php');
      echo "</head>";
  ?>
  <body>
  </body>
  </html>
  
