<?php
function emptyInputSignUp($name, $email, $password, $rpassword)
{
    $result = "";
    if (empty($name) || empty($email) || empty($password) || empty($rpassword)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function invalidUser($name)
{
    $result = "";
    if (preg_match("/^[a-zA-Z]*$/", $name)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function invalidEmail($email)
{
    $result = "";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function pwdMatch($password, $rpassword)
{
    $result = "";
    if ($password !== $rpassword) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function userExist($conn, $name, $email)
{
    $query = "SELECT * FROM users WHERE name=? OR email=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location : sign_up.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $name, $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function  createUser($conn, $name, $email, $password)
{
    $query = "INSERT INTO users (name,email,password) VALUES (?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location : sign_up.php?error=stmtfailed");
        exit();
    }
    $hashedPwd = password_hash($password,PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $name, $email,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    header("location : sign_up.php?error=none");
    exit();
    
}
