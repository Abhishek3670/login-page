<?php
include "config.php";
include "function.php";

if (isset($_POST['signin'])) {
    $email = mysqli_real_escape_string($conn, $_POST['your_email']);
    $pass = mysqli_real_escape_string($conn, $_POST['your_pass']);
    
    if (emptyInputSignIn($email, $pass)) {
        header("location: ../sign_in.php?error=emptyInput");
        exit();
    }
    if (invalidEmail($email) === false) {
        header('location: ../sign_up.php?error=invalidEmail');
        exit();
    }
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 1) {//user exists
        loginUser($conn, $email, $pass);
    }
    else{
        header("location: ../sign_in.php?error=incorectMailOrPassword");
        exit();
    }
} else {
    header("location: ../sign_in.php");
}
