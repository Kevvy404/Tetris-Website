<?php

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once 'dbconnect.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($username, $password !== false)) {
        header("location: ../index.php?error=emptyLoginInput");
        exit();
    }

    loginUser($connect, $username, $password);
    
}
else {
    header("location: ../index.php");
    exit();
}