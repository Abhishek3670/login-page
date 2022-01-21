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
        header("location: sign_up.php?error=emptyinput");
        exit();
    }
    if (invalidUser($name) !== false) {
        header('location : sign_up.php?error=invalidUser');
        exit();
    }
    if (invalidEmail($email) !== false) {
        header('location : sign_up.php?error=invalidEmail');
        exit();
    }
    if (pwdMatch($password, $rpassword) !== false) {
        header('location : sign_up.php?error=passwordDoNotmMatch');
        exit();
    }
    if (userExist($conn, $name ,$email) !== false) {
        header('location : sign_up.php?error=userExist');
        exit();
    }
    createUser($conn,$name,$email,$password);
}
else{
    header("location :sign_up.php");
    exit();
}

// SignIn Validation

if (isset($_POST['signin'])) {
    $email = mysqli_real_escape_string($conn, $_POST['your_email']);
    $password = mysqli_real_escape_string($conn, $_POST['your_pass']);
    $errors = array();
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $results = mysqli_query($conn, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $email;
            $_SESSION['success'] = "You are now logged in";
            header('location: home.php');
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}
