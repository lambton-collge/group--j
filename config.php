<?php
    $host = "localhost";
    $user = "root";                     //Your db username
    $pass = "";                                  //Remember, there is NO password by default!
    $db = "db_movie";                                  //Your database name you want to connect to
    $con = mysqli_connect($host, $user, $pass, $db)or die(mysql_error());
?>