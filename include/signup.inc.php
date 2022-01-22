<?php
include "config.php";
include "function.php";

// SignUp Validation

if (isset($_POST['signup'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    $rpassword = mysqli_real_escape_string($conn, $_POST['re_pass']);

    if (emptyInputSignUp($name, $email, $password, $rpassword)) {
        header("location: ../sign_up.php?error=emptyinput");
        exit();
    }
    if (invalidUser($name) !== false) {
        header('location : ../sign_up.php?error=invalidUser');
        exit();
    }
    if (invalidEmail($email) !== false) {
        header('location : ../sign_up.php?error=invalidEmail');
        exit();
    }
    if (pwdMatch($password, $rpassword) !== false) {
        header('location : ../sign_up.php?error=passwordDoNotMatch');
        exit();
    }
    if (userExist($conn, $name ,$email) !== false) {
        header('location : ../sign_up.php?error=userExist');
        exit();
    }
    createUser($conn,$name,$email,$password);
    
}
else{
    header("location: ../sign_up.php");
    exit();
}
