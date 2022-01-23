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
function emptyInputSignIn($email, $password)
{
    $result = "";
    if ( empty($email) || empty($password)) {
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
    $result="";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result=false;
    } 
    else {
        $result=true;
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
function userExist($conn, $email)
{
    $query = "SELECT * FROM users WHERE email='$email'";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../sign_up.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    } else {    
        return $result=false;
    }
    mysqli_stmt_close($stmt);
}

function  createUser($conn, $name, $email, $password)
{
    
    $hashedPwd = password_hash($password,PASSWORD_DEFAULT);
    $query = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$hashedPwd');";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../sign_up.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    header("location: ../sign_in.php");
    exit();
    
}

function loginUser($conn , $email,$password){
    $userExists = userExist($conn,$email);
    if($userExists === false)
    {
        header("location: ../sign_in.php?userDoesNotExist");
        exit();
    }

    $pwdHashed = $userExists["password"];
    echo 
    $checkPwd = password_verify($password,$pwdHashed);

    if(!$checkPwd){
        header("location: ../sign_in.php?error=wrongPassword");
        exit();
    }
    else{
            session_start();
            $_SESSION["username"] = $userExists["name"];
            header("location: ../pages/home.php");
            exit();

    }
}