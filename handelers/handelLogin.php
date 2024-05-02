<?php 
session_start();
require_once "../database.php";
include '../core/function.php';
include '../core/validation.php';
$errors=[];
if(isset($_POST["login"])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute SQL query
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
            header("Location: ../index.php");
            die();
        } else {
            $errors[]='Password does not match';
            // echo "<div class='alert alert-danger'>Password does not match</div>";
        }
    } else {
        $errors[]='Email does not exist';
        // echo "<div class='alert alert-danger'>Email does not exist</div>";
    }
    $_SESSION['errors']=$errors;
    if(!empty($_SESSION['errors'])){
        redirect("../login.php");
        exit();
    }

    mysqli_stmt_close($stmt);
}
?>
