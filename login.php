<?php


    $bg = "images/bg".rand(1,8).".jpg";

    echo "<html style='background: url($bg) no-repeat center center fixed;
    -webkit-background-size: cover !important;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover !important;'>";
      echo "<head>";
      include_once('req_files.php');
      require('db_conn.php');
      echo "</head>";
  ?>
  
  <body>
    <br><br><br><br><br>
    
      <div style="position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);">
        <form method="POST" action="admin.php">
        <table class="mdl-data-table mdl-js-data-table" >
  
  <tbody>
    <tr><th colspan="2"><h6>Enter Your Credentials</h6></th></tr>
    <tr>
      <td class="mdl-data-table__cell--non-numeric"><em>Username</em></td>
      <td><input type = "text" name="username"></td>
 
    </tr>
    <tr>
      <td class="mdl-data-table__cell--non-numeric"><em>Password</em></td>
      <td><input type = "password" name="password"></td>
    
    </tr>
 

  
  </tbody>
</table>
      <br>
  <input class='mdl-button mdl-js-button mdl-button--  raised mdl-js-ripple-effect mybutton' 
      style="left:40%"
     type = "submit" name="login" value="Log In">
      </form>
      </div>
    
    
  </body>
  </html>
  
