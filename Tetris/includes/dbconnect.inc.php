<?php

    $serverName = "localhost";
    $dbUsername = "root";
    $dbPassword = "WebDev2021";
    $dbName = "tetris"; 
    $port = "53331";

    $connect = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName, $port);

    if (!$connect){
        die("Could not connect to database: " . mysqli_connect_error());
    }

?>
