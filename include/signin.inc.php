<?php
include "config.php";
include "function.php";

if (isset($_POST['signin'])) {
    $email = mysqli_real_escape_string($conn, $_POST['your_email']);
    $password = mysqli_real_escape_string($conn, $_POST['your_pass']);
   
    
    if (emptyInputSignIn( $email, $password) ){
        header("location: ../sign_up.php?error=emptyinput");
        exit();
    }
    loginUser($conn,$email,$password);
}else{
    header("location: ../sign_in.php");
}
?>