<?php
    define('USER',"root");
    define('SERVER',"127.0.0.1");
    define('PASSWORD',"jaffar123");
    define('DATABASE','blog');
    $db = mysqli_connect(SERVER,USER,PASSWORD,DATABASE) 
        OR die('Failed to connect <br>'. mysqli_connect_error());
?>