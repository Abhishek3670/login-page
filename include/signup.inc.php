<?php


// SignUp Validation

if (isset($_POST['signup'])) {
    require_once "config.php";
    require_once "function.php";
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    $rpassword = mysqli_real_escape_string($conn, $_POST['re_pass']);

    
    if (emptyInputSignUp($name, $email, $password, $rpassword)) {
        header("location: ../sign_up.php?error=emptyinput");
        exit();
    }
    if (invalidUser($name) === false) {
        header('location: ../sign_up.php?error=wrongNameFormat');
        exit();
    }
    if (invalidEmail($email) === false) {
        header('location: ../sign_up.php?error=invalidEmail');
        exit();
    }
    if ($password != $rpassword) {
        header('location: ../sign_up.php?error=passwordDoNotMatch');
        exit();
    }
    if (userExist($conn, $email) === true) {
        header('location: ../sign_up.php?error=userExist');
        exit();
    }
    createUser($conn, $name, $email, $password);
} else {
    header("location: ../sign_up.php");
    exit();
}
