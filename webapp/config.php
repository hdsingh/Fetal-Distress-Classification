<?php
    define('server', 'localhost');
    define('username', 'root');
    define('password', 'password!@#$');
    define('db', 'neodesign');

    $link = mysqli_connect(server, username, password, db);

    if($link === false){
        die('Error: Couldn\'t connect.' . mysqli_connect_error());
    }
?>