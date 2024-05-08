<?php
    session_start();
    $errors=[];
    include '../core/function.php';
    include '../core/validation.php';
    include '../database.php';
    if(CheckRequestMethod("POST") &&checkpostinput('username')){
        foreach($_POST as $key => $value){
             $$key=sanitizeinput($value);
        }
    }

    if(!requiredval($username)){
        $errors[]= "name is reqired";
    }elseif(!min_val($username,3)){
        $errors[]= "name must be greater than 3 char";
    }elseif(!max_val($username,25)){
        $errors[]= "name must be less than 25 chars";
    }

    if(!requiredval($email)){
        $errors[]= "email is reqired";
    }elseif(!email_val($email)){
        $errors[]="please type a valid email";
    }

    if(!requiredval($password)){
        $errors[]= "password is reqired";
    }elseif(!min_val($password,6)){
        $errors[]= "password must be greater than 6 char";
    }elseif(!max_val($password,18)){
        $errors[]= "password must be less than 18 chars";
    }
   // Check if email already exists
$sql = "SELECT * FROM user WHERE email=?";
$stmt = mysqli_stmt_init($con);
if (mysqli_stmt_prepare($stmt, $sql)) {
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $row_count = mysqli_stmt_num_rows($stmt);
    if ($row_count > 0) {
        $errors[] = "Email already exists";
    }
    mysqli_stmt_close($stmt);
} else {
    $errors[] = "SQL statement preparation failed: " . mysqli_error($conn);
}

// If no errors, insert new user
if (empty($errors)) {
    $sql = "INSERT INTO user (name,username, email, password) VALUES (?,?, ?, ?)";
    $stmt = mysqli_stmt_init($con);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssss",$name, $username, $email, password_hash($password,PASSWORD_DEFAULT));
        mysqli_stmt_execute($stmt);
        $data=[$username,$email,sha1($password)];
        $_SESSION['auth']=[$username,$email];
        redirect("../index.php");
        die();
    } else {
        die("SQL statement preparation failed: " . mysqli_error($conn));
    }
    mysqli_stmt_close($stmt);
} else {
    $_SESSION['errors'] = $errors;
    redirect("../signup.php");
    exit;
}

?>
