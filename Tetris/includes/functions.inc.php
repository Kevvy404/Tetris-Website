<?php

function emptySignupInput($username,$firstName,$lastName,$password,$repeatPassword){
    $result = true;
    if (empty($username) || empty($firstName) || empty($lastName) || empty($password) || empty($repeatPassword)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function passwordMatch($password, $repeatPassword){
    $result = true;
    if ($password !== $repeatPassword) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function usernameAlreadyExists($connect, $username){
    $sql = "SELECT * FROM Users WHERE username = ?;";
    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=UsernameAlreadyTaken");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $getResult = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($getResult)) {
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($connect, $username, $firstName, $lastName, $password, $display) {
    $sql = 'INSERT INTO Users (UserName, FirstName, LastName, Password, Display) VALUES (?, ?, ?, ?, ?)';
    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=UsernameAlreadyTaken");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, 'ssssi', $username, $firstName, $lastName, $hashedPassword, $display);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../Tetris/index.php?error=none");
    exit();
}

function emptyInputLogin($username,$password){
    $result = true;
    if (empty($username) || empty($password)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function loginUser($connect,$username,$password) {
    $usernameExists = usernameAlreadyExists($connect, $username);

    if ($usernameExists === false) {
        header("location: ../index.php?error=wrongLoginDetails");
        exit();
    }

    $hashedPassword = $usernameExists["Password"];
    $checkPassword = password_verify($password,$hashedPassword);

    if ($checkPassword === false) {
        header("location: ../index.php?error=wrongLoginDetails");
        exit();
    }
    else if ($checkPassword === true) {
        session_start();
        $_SESSION["username"] = $usernameExists["UserName"];
        header("location: ../index.php");
        exit();
    }
}
function addScoreToLeaderboard($connect, $username, $score) {
    $sql = 'INSERT INTO Scores (Username, Score) VALUES (?, ?)';
    $stmt = mysqli_stmt_init($connect);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../tetris.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'si', $username, $score);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../leaderboard.php?error=None");
    exit();
}
?>