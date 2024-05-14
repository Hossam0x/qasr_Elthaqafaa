<?php 
session_start();
require_once "../database.php";
include '../core/function.php';
include '../core/validation.php';
$errors=[];
if(checkpostinput('login')){
    $email =sanitizeinput( $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE email=?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    // Check if user exists
    if(mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

        // Verify password
        if(password_verify($password, $user['password'])) {
            $_SESSION['auth']=[$user['username'],$email];
            redirect("../index.php");
            die();
        } else {
            $errors[]='Password does not match';
        }
    } else {
        $errors[]='Email does not exist';
    }
    $_SESSION['errors']=$errors;
    if(!empty($_SESSION['errors'])){
        redirect("../login.php");
        exit();
    }

    mysqli_stmt_close($stmt);
}
?>
